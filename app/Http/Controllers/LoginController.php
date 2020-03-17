<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    function login(){
       
    	return view('login');
    }
    function loginIslem(Request $request){
    	if ($request->method() == 'POST') {
            $url = $request->url();

    		$username = $request->input('name');
    		$pass = md5($request->input('password'));
            
    		$kullanici = 
    			DB::table('users')
    						->where('email','=',$username)
    						->where('password','=',$pass)
    						->get()->first();
                            
            if (!empty($kullanici)) {
                Log::info('Kullanıcı Giriş Yaptı. ID = '.$kullanici->id);

                $authority = json_decode($kullanici->authority);
                if (!empty($authority)) {

                    $this->py($authority);
                    $this->py(count((array)$authority));
                    $d = array();
                    foreach ($authority as $key => $value) {
                        print_r($value);
                        $d[] = $key;
                    }
                    $this->py($d);
                    echo "authority var";
                    $menu = $this->menugetir($d);
                    $this->py($menu);
                    $links = array();

                    foreach ($menu as $key => $value) {
                        if (isset($value['elements'])) {
                            foreach ($value['elements'] as $k => $v) {
                                echo $k."<br>".print_r($v)."<br>";
                                $links[$v['id']] = $v['url'];
                            }                            
                        }else{
                            $links[$key] = $value['url'];
                        }
                    }
                    $this->py($links);

                    $kullanici->links = $links;

                    $stringMenu = '';

                    foreach ($menu as $key => $value) {
                        if (isset($value['elements'])) {
                            $stringMenu .= '<a href="'.$value['url'].'" '.$value['class'].''.$value['name'].'</span></a>
                            <div class="collapse" id="'.substr($value['url'], 1).'">';
                            foreach ($value['elements'] as $k => $v) {
                                $stringMenu .= '<a href="'.$url.'/'.$v['url'].'" '.$v['class'].
                                $v['name']
                                ."</span></a>";
                            }
                            $stringMenu .= "</div>";
                        }else{
                            $stringMenu .= '
                            <a href="'.$url.'/'.$value['url'].'" '.$value['class'].' '.
                            $value['name']
                            ."</span></a>";
                        }
                    }

                    $kullanici->stringMenu = $stringMenu;
                    $request->session()->put('kullanici',$kullanici);
                }else{
                    $request->session()->put('kullanici',$kullanici);
                    echo "authority boş";
                }

                return redirect('panel');
    		}else{
                return redirect('/');
            }
    	}else{
    		return view('login');
    	}
    }
    function menuGetir($arr){
        $data = DB::table('modules')->select('*')->whereIn('id',$arr)->get();
        $menu = array();

        foreach ($data as $key => $value) {
            if ($value->m_id == 0) {
                $menu[$value->id]['id'] = $value->id;
                $menu[$value->id]['name'] = $value->name;
                $menu[$value->id]['url'] = $value->url;
                $menu[$value->id]['class'] = $value->class;
                $m_name = $value->name;
            }else{
                $uD = DB::table('modules')->select('*')->where('id','=',$value->m_id)->get()->first();
                $menu[$value->m_id]['id'] = $uD->id;
                $menu[$value->m_id]['name'] = $uD->name;
                $menu[$value->m_id]['url'] = $uD->url;
                $menu[$value->m_id]['class'] = $uD->class;


                $menu[$value->m_id]['elements'][] = array(
                    'id'=>$value->id,
                    'url'=>$value->url,
                    'name'=>$value->name,
                    'class'=>$value->class
                );
            }
        }
        return $menu;
    }
}
