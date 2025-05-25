<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;

class AdminController extends Controller
{
    public function AuthView()
    {
        return view('admin.admin', ['pageTitle' => 'Iniciar sesión']);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        $login = $request->input('email');
        $password = $request->input('password');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if (Auth::attempt([$fieldType => $login, 'password' => $password])) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }
        return back()->withErrors([
            'email' => 'Las credenciales no son válidas.',
        ]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }
    public function gestionPlanes(Request $request)
    {
        $planes = Plan::all();
        return view('admin.gestionplanes', ['planes' => $planes, 'pageTitle' => 'Gestionar planes']);
    }
    public function editarplan(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'tiempo_meses' => 'required|integer|min:1',
            'cantidad_anuncios' => 'required|integer|min:1',
            'precio_ar' => 'nullable|integer|min:0',
            'precio_bo' => 'nullable|integer|min:0',
            'precio_br' => 'nullable|integer|min:0',
            'precio_cl' => 'nullable|integer|min:0',
            'precio_co' => 'nullable|integer|min:0',
            'precio_ec' => 'nullable|integer|min:0',
            'precio_mx' => 'nullable|integer|min:0',
            'precio_pe' => 'nullable|integer|min:0',
            'precio_ve' => 'nullable|integer|min:0',
        ]);
        try {
            $plan = Plan::create($validated);
            if ($plan) {
                return redirect()->back()->with('success', '¡Plan guardado correctamente!');
            } else {
                return redirect()->back()->withErrors(['mensaje' => 'No se pudo guardar el plan.']);
            }
        } catch (\Exception $e) {
            Log::error('Error al guardar el plan: ' . $e->getMessage());
            return redirect()->back()->withErrors(['mensaje' => 'Ocurrió un error inesperado: ' . $e->getMessage()]);
        }
    }
    public function eliminarplan(Request $request)
    {
        $id_eliminar=$request->get('id_eliminar');
        Plan::where('id', $id_eliminar)->delete();
        return redirect()->back()->with('success', '¡Plan guardado correctamente!');
    }
}
