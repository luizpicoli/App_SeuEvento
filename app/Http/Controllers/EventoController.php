<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Evento;

class EventoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        // se não estiver autenticado, redireciona para login
        if (!Auth::check()) {
            return redirect('/');
        }
//          
        $eventos = Evento::paginate(3);
        return view('eventos_list', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        // se não estiver autenticado, redireciona para login
        if (!Auth::check()) {
            return redirect('/');
        }
        // indica inclusão
        $acao = 1;

        return view('eventos_form', compact('acao'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'nome' => 'required|min:3|max:60',
            'local' => 'required|min:3|max:40',
            'atracao' => 'required|min:3|max:40',
            'data' => 'required|min:10|max:10',
            'detalhes' => 'required|min:5|max:100',
            'preco' => 'required'
        ]);

        // recupera todos os campos do formulário
        $dados = $request->all();

        // insere os dados na tabela
        $event = Evento::create($dados);

        if ($event) {
            return redirect()->route('eventos.index')
                            ->with('status', $request->nome . ' Incluído!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        // se não estiver autenticado, redireciona para login
        if (!Auth::check()) {
            return redirect('/');
        }
        // obtém os dados do registro a ser editado 
        $reg = Evento::find($id);

        // indica ao form que será alteração
        $acao = 2;

        return view('eventos_form', compact('reg', 'acao'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $this->validate($request, [
            'nome' => 'required|min:3|max:60',
            'local' => 'required|min:3|max:40',
            'atracao' => 'required|min:3|max:40',
            'data' => 'required|min:10|max:10',
            'detalhes' => 'required|min:5|max:100',
            'preco' => 'required'
        ]);


        $reg = Evento::find($id);

        $dados = $request->all();

        $alt = $reg->update($dados);

        if ($alt) {
            return redirect()->route('eventos.index')
                            ->with('status', $request->nome . ' Alterado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $evento = Evento::find($id);
        if ($evento->delete()) {
            return redirect()->route('eventos.index')
                            ->with('status', $evento->nome . ' Excluído!');
        }
    }

    public function foto($id) {
        // se não estiver autenticado, redireciona para login
        if (!Auth::check()) {
            return redirect('/');
        }
        // obtém os dados do registro a ser exibido
        $reg = Evento::find($id);

        return view('eventos_foto', compact('reg'));
    }

    public function storefoto(Request $request) {

        // recupera todos os campos do formulário
        $dados = $request->all();

        $id = $dados['id'];

        if (isset($dados['foto'])) {
            $fotoId = $id . '.jpg';
            $request->foto->move(public_path('fotos'), $fotoId);
        }

        return redirect()->route('eventos.index')
                        ->with('status', $request->nome . ' com Foto Cadastrada!');
    }

    public function pesq() {
        // se não estiver autenticado, redireciona para login
        if (!Auth::check()) {
            return redirect('/');
        }
        $eventos = Evento::paginate(3);
        return view('eventos_pesq', compact('eventos'));
    }

    public function filtro(Request $request) {
        // obtém dados do form de pesquisa
        $nome = $request->nome;

        $cond = array();

        if (!empty($nome)) {
            array_push($cond, array('nome', 'like', '%' . $nome . '%'));
        }

        $eventos = Evento::where($cond)
                        ->orderBy('nome')->paginate(3);
        return view('eventos_pesq', compact('eventos'));
    }

    public function filtro2(Request $request) {
        // obtém dados do form de pesquisa
        $modelo = $request->modelo;

        if (empty($precomax)) {
            $carros = Carro::where('modelo', 'like', '%' . $modelo . '%')
                            ->orderBy('modelo')->paginate(3);
        } else {
            $carros = Carro::where('modelo', 'like', '%' . $modelo . '%')
                            ->where('preco', '<=', $precomax)
                            ->orderBy('modelo')->paginate(3);
        }
        return view('carros_pesq', compact('carros'));
    }

    public function graf() {
        $eventos = DB::table('eventos')
                ->join('convidados', 'eventos.convidado_id', '=', 'convidados.id')
                ->select('convidados.id as convidado', DB::raw('count(*) as num'))
                ->groupBy('eventos.nome')
                ->get();
        return view('eventos_graf', compact('eventos'));
    }

}
