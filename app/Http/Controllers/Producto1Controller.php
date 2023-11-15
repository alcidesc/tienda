<?php

namespace App\Http\Controllers;

use App\Models\Producto1;
use Illuminate\Http\Request;

/**
 * Class Producto1Controller
 * @package App\Http\Controllers
 */
class Producto1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producto1s = Producto1::paginate();

        return view('producto1.index', compact('producto1s'))
            ->with('i', (request()->input('page', 1) - 1) * $producto1s->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto1 = new Producto1();
        return view('producto1.create', compact('producto1'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto1::$rules);

        $producto1 = Producto1::create($request->all());

        return redirect()->route('producto1s.index')
            ->with('success', 'Producto1 created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto1 = Producto1::find($id);

        return view('producto1.show', compact('producto1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto1 = Producto1::find($id);

        return view('producto1.edit', compact('producto1'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto1 $producto1
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto1 $producto1)
    {
        request()->validate(Producto1::$rules);

        $producto1->update($request->all());

        return redirect()->route('producto1s.index')
            ->with('success', 'Producto1 updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto1 = Producto1::find($id)->delete();

        return redirect()->route('producto1s.index')
            ->with('success', 'Producto1 deleted successfully');
    }
}
