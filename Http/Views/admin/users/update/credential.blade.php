@extends("delta::admin.layout")

        @section("body")

        <h4>{{$title}}</h4>

        <article class="box box-light">

                <header class="box-header">
                        <h4>{{__("words.form")}}</h4>
                </header>

                <section class="box-body pt-3">
                        <form action="{{__url('__now')}}" 
                                method="POST">

                                <article class="block">

                                        <div class="form-group pb-2">
                                                {!! $hasError("fullname") !!}

                                                <div class="form-floating">
                                                        <input type="text" 
                                                                id="fullname"
                                                                name="fullname"
                                                                value="{{old('fullname', $user->fullname)}}" 
                                                                class="form-control"
                                                                placeholder="{{__("words.fullname")}}">

                                                        <label for="fullname">
                                                                {{__("words.fullname")}}
                                                        </label>
                                                </div>
                                        </div>

                                        <div class="form-group pb-3">

                                                {!! $hasError("email") !!}

                                                <div class="form-floating">
                                                        <input type="email" 
                                                                id="rnc"
                                                                name="email"
                                                                value="{{old('email', $user->email)}}" 
                                                                class="form-control"
                                                                placeholder="{{__("words.email")}}">
                                                        <label for="email">
                                                                {{__("words.email")}}
                                                        </label>
                                                </div>  
                                        </div>

                                        <div class="form-group pb-3">

                                                {!! $hasError("rnc") !!}

                                                <div class="form-floating">
                                                        <input type="text" 
                                                                id="rnc"
                                                                name="rnc"
                                                                value="{{old('rnc', $user->rnc)}}" 
                                                                class="form-control"
                                                                placeholder="{{__("user.rnc")}}">
                                                        <label for="rnc">
                                                                {{__("words.rnc")}}
                                                        </label>
                                                </div>
                                        </div>

                                        <div class="form-group pb-3">

                                                {!! $hasError("cellphone") !!}

                                                <div class="form-floating">
                                                        <input type="text" 
                                                                id="cellphone"
                                                                name="cellphone"
                                                                value="{{old('cellphone')}}" 
                                                                class="form-control"
                                                                placeholder="{{__("word.cellphone")}}">
                                                        <label for="passcert">
                                                                {{__("words.cellphone")}}
                                                        </label>
                                                </div>  
                                        </div>
                                        

                                        <div class="">
                                                @csrf
                                                <button type="submit" class="btn btn-outline-secondary">
                                                        {!! __mdi("content-save") !!}
                                                        {{__("user.create")}}
                                                </button>
                                                <a href="{{__url("__admin/users")}}" class="btn btn-danger">
                                                        {!! __mdi("close") !!}
                                                        {{__("words.close")}}
                                                </a>
                                        </div>

                                </article>
                        </form>
                </section>
        </article>

        @endsection