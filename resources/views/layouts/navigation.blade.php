@if(auth()->user()->onTrial())
    <div class="bg-red-500 flex items-center justify-center text-white py-2">Está a utilizar a versão experimental. <a class="underline ml-2" href="/billing">Compre o Aprender Digital Aqui</a></div>
@endif
<div class="navbar bg-base-200">

    <div class="flex-1">
      <a class="btn btn-ghost normal-case text-xl">Psyquence</a>
    </div>
    <div class="flex-none mr-4">
        <div class="dropdown dropdown-end">
            <label tabindex="0" class="flex items-center justify-center gap-4 cursor-pointer" >
                {{ auth()->user()->name }}
                </label>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">

                <li><a href="/">Billing</a></li>
              <li><a href="{{ route('auth.logout')}}">Logout</a></li>
            </ul>
          </div>
          
    </div>
  </div>
