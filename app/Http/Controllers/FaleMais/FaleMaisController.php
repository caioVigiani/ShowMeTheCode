<?php

namespace App\Http\Controllers\FaleMais;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Cidade;
use App\Pacote;
use App\Ligacao;
use NumberHelper;

class FaleMaisController extends Controller
{

    public function view()
    {
        $cidades = Cidade::getAll();
        $pacotes = Pacote::getAll();
        return view('faleMais.consulta', compact('cidades','pacotes'));
    }

    public function resultadoFaleMais(Request $request) {

        $validator = Validator::make($request->all(), [
            'cidadeOrigem' => 'required',
            'cidadeDestino' => 'required|different:cidadeOrigem',
            'minutosLigacao' => 'numeric|min:1'
        ], [
            'cidadeOrigem.required' => 'Selecione uma :attribute!',
            'cidadeDestino.required' => 'Selecione uma :attribute!',
            'minutosLigacao.numeric' => 'Insira a duração de sua ligação!',
            'minutosLigacao.min' => 'Sua ligação deve ter uma duração mínima de :min minutos!',
            'cidadeDestino.different' => 'O Consulte Fale Mais só aceita ligações para cidades diferentes!'
        ]);

        if ($validator->fails()) {
            return back()
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $data = $request->all();

        $objetoConsulta = (object) [
            'idCidadeOrigem' => $data['cidadeOrigem'],
            'idCidadeDestino' => $data['cidadeDestino'],
            'minutosLigacao' => $data['minutosLigacao'],
            'idPacoteUtilizado' => $data['pacoteUtilizado']
        ];

        $objetoCalculo = $this->calcular($objetoConsulta);

        return view('faleMais.resultado', compact('objetoCalculo'));
    }

    private function calcular($objectConsulta) {
        $minutosDescontados = Pacote::getMinutosPorIdPacote($objectConsulta->idPacoteUtilizado);

        $precoComPacote = NumberHelper::formataPreco(
            Ligacao::calculaPrecoLigacao(
                $objectConsulta->idCidadeOrigem,
                $objectConsulta->idCidadeDestino,
                $objectConsulta->minutosLigacao,
                TRUE,
                $minutosDescontados
            )
        );

        $precoSemPacote = NumberHelper::formataPreco(
            Ligacao::calculaPrecoLigacao(
                $objectConsulta->idCidadeOrigem,
                $objectConsulta->idCidadeDestino,
                $objectConsulta->minutosLigacao,
                FALSE
            )
        );

        $objetoCalculo = (object) [
            'cidadeOrigem' => Cidade::getNomePorIdCidade($objectConsulta->idCidadeOrigem),
            'cidadeDestino' => Cidade::getNomePorIdCidade($objectConsulta->idCidadeDestino),
            'minutosLigacao' => $objectConsulta->minutosLigacao,
            'pacoteUtilizado' => Pacote::getNomePorIdPacote($objectConsulta->idPacoteUtilizado),
            'precoComPacote' => $precoComPacote,
            'precoSemPacote' => $precoSemPacote
        ];

        return $objetoCalculo;
    }
}