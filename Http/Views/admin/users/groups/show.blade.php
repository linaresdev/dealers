@extends("delta::admin.layout")

    @section("body")

	<h4>
        <span class="mdi mdi-account-multiple"></span>
        {{$title}}
    </h4>

    <article class="bg-white p-3 shadow-sm rounded-1">
        <section class="p-3">
            <a href="{{__url('admin/users')}}" 
                class="btn btn-sm btn-light rounded-pill px-3 border">
                {{__("words.users")}}
            </a>
            <a href="{{__url('admin/users/groups')}}" 
                class="btn btn-sm btn-light rounded-pill px-3 border">
                {{__("words.groups")}}
            </a>
        </section>

        <section class="row">
            <article class="col-lg-4 col-md-4 col-sm-12">
                <h4>{{__("words.users")}}</h4>
                <form action="#">
                    <div class="pb-1">
                        <input type="text" class="form-control">
                    </div>
                </form>
            </article>
            <article class="col-lg-8 col-md-8 col-sm-12 py-4">
                <h4>{{$group->group}}</h4>
                
                <section class="">
                    
                    @foreach($group->users as $user)
                    <div class="d-flex align-items-center border rounded-1 mb-1">

                        <div class="border-end border-white p-1">
                            <img src="{{__url($user->avatar)}}" 
                                style="width:64px;" 
                                class="avatar rounded-circle"
                                alt="@">
                        </div>

                        <div class="p-1 flex-fill">
                            <strong class="px-3">{{$user->fullname}}</strong> <small>{{$user->email}}</small>
                            <div class="nav">
                                <a href="{{__url('{rol}/toggle/'.$user->id.'/view')}}" class="nav-link">
                                    {!! $checkbox($rol($user)->view) !!}                                    
                                    {{__("words.view")}}
                                </a>
                                <a href="{{__url('{rol}/toggle/'.$user->id.'/insert')}}" class="nav-link">
                                    {!! $checkbox($rol($user)->insert) !!} 
                                    {{__("words.insert")}}
                                </a>
                                <a href="{{__url('{rol}/toggle/'.$user->id.'/update')}}" class="nav-link">
                                {!! $checkbox($rol($user)->update) !!}
                                    {{__("words.update")}}
                                </a>
                                <a href="{{__url('{rol}/toggle/'.$user->id.'/delete')}}" class="nav-link">
                                    {!! $checkbox($rol($user)->delete) !!} 
                                    {{__("words.delete")}}
                                </a>
                            </div>
                        </div>
                        <div class="p-3 text-right">
                            <a href="#" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                                Quitar
                            </a>
                        </div>
                    </div>
                    @endforeach
                    
                </section>
            </article>
        </section>
    </article>

    @endsection