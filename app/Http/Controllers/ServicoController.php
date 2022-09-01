<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{

    /**
     * Lista os serviços
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $servicos = Servico::simplePaginate(10);


        return view('servicos.index')->with('servicos', $servicos);
    }
    /**
     * Mostra o form vazio para criação
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('servicos.create');
    }

    /**
     * Cria um novo regristo no BD
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     *
     */
    public function store(ServicoRequest $request)
    {
        $dados = $request->except('_token');


         Servico::create($dados);

       return redirect()->route('servicos.index')
            ->with('mensagem', 'Serviço criado com sucesso!');
    }
    /**
     * Mostra o form preenchido para alteração
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     *
     */
    public function edit(Servico $servico)
    {
            return view('servicos.edit')->with('servico', $servico);
    }
    /**
     * Atualiza um regristo no BD
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function update(Servico $servico, Request $request)
    {
        $dados = $request->except(['_token', '_method']);

       
        $servico->update($dados);

        return redirect()->route('servicos.index')
            ->with('mensagem', 'Serviço atualizado com sucesso!');
    }


}
