<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        //$users = User::all();
        $users = User::paginate(5);
        return view('admin.users.index', compact('users'));
        
    }

    public function create(){
       
        return view('admin.users.create');
        
    }
    //inserindo o Request no envio dos dados, validação feita no request
    public function store(StoreUserRequest $request){
       
         User::create($request->validated());
         return redirect()->route('users.index');
    }

    public function edit(string $id){
      //$user = User::where('id','=', $id)->first();
      //$user = User::where('id',$id)->first();
        if(!$user = User::find($id)){
            return redirect()->route('users.index')->with('message','User not found');
        }
        return view('admin.users.edit', compact('user'));
    
    }


    public function update(UpdateUserRequest  $request, string $id){
        //$user = User::where('id','=', $id)->first();
        //$user = User::where('id',$id)->first();
          if(!$user = User::find($id)){
              return redirect()->route('users.index')->with('message','User not found');
          }
          /* atualizando somente os dados request
          $user->update($request->only([
            'name',
            'email',
          ]));
          verifica se senha foi informada e criptografa antres de salvar
          */
        $data = $request->only([
            'name',
            'email',
        ]);
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        $user->update($data);

        return redirect()->route('users.index')->with('success','User updated');
          
      }


      public function show(string $id){
      
          if(!$user = User::find($id)){
              return redirect()->route('users.index')->with('message','User not found');
          }
          return view('admin.users.show', compact('user'));
      
      }


      public function destroy(string $id){
      
        if(!$user = User::find($id)){
            return redirect()->route('users.index')->with('message','User not found');
        }
        if(Auth::user()->id === $user->id){
            return back()->with('message','you can not delete yourself');
        }

        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted');
    
    }
}
