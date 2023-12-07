<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Models\Avatars;
use App\Models\News;
use App\Models\Programs;
use App\Models\User;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('business.programs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Programs $program)
    {
        $news = $program->news()->orderBy('sort')->get();
      
        $avatars = Avatars::where('user_id', auth()->user()->id)->get();
        
        //lista url de avatars que estan en este programa
        $avatarRoutes = [];
        foreach ($news as $new) {
            $avatarRoutes[] = $new->avatar->route_path;
        }        

        return view('business.programs.show', compact(
            'program', 
            'news',
            'avatars',
            'avatarRoutes'
            ));
    }


    public function new_store(Request $r)
    {
        try {
            //validar afura en el js

            // registrar nueva noticia
            News::create($r->except('_token'));

            //restar un credtito
            $user = User::find(auth()->user()->id);
            $user->credits = $user->credits - 1;
            $user->save();

            return response()->json([
                'message' => 'success',
                'credits' => $user->credits,
            ]);
        
        } catch (\Throwable $th) {
            // Retorna el mensaje de error en lugar de 'success'
            return response()->json([
                'message' => 'error',
                'error' => $th->getMessage(), // Agregamos el mensaje de error
            ]);
        }
       
    }

    public function new_update(Request $r)
    {
        try {

            // simplemente actualizo la el sord
            // $program = Programs::find($r->program_id);
      
            if($r->a != $r->b){
                // buscar new por sord
                $a = News::where('sort', $r->a)
                    ->where('program_id', $r->program_id)    
                    ->first();
                $b = News::where('sort', $r->b)
                    ->where('program_id', $r->program_id)    
                    ->first();
              
                $a->sort = $r->b;
                $b->sort = $r->a;
                
                $a->save();
                $b->save();
            }else{
                //elimanr new y recorrer
                News::where('sort', $r->a)
                ->where('program_id', $r->program_id)    
                ->delete();

                $count = News::where('program_id', $r->program_id)->count();
                
                for ($i=$r->a; $i < $count; $i++) { 
                    $new = News::where('sort', $i+1)
                        ->where('program_id', $r->program_id)    
                        ->first();
                    $new->sort = $i;
                    $new->save();
                }
            }

            return response()->json([
                'message' => 'success',
            
            ]);
        
        } catch (\Throwable $th) {
            // Retorna el mensaje de error en lugar de 'success'
            return response()->json([
                'message' => 'error',
                'error' => $th->getMessage(), // Agregamos el mensaje de error
            ]);
        }
       
    }
   


}
