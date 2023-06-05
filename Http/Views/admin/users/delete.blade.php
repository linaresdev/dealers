@extends("delta::admin.layout")

	@section("body")

	<h4>{{__("delete.forever")}}</h4>

	<article class="box bg-danger text-white">

		<header class="box-header">
			<h4>{{__($user->fullname)}}</h4>
		</header>

		<section class="box-body">
			<article class="block">
				Esta seguro que desea eliminar esta cuenta de manera permanente. Tenga en cuenta que se destruirá todos sus datos.
			</article>
			<article class="block">
				<a href="{{__url('__users/'.$user->id.'/delete/forever')}}" class="btn btn-danger active">
					{!! __mdi("delete-outline") !!}
					{{__("words.delete")}}
				</a>
				<a href="{{__url('__users')}}" class="btn btn-danger active">
					{!! __mdi("close") !!}
					{{__("words.close")}}
				</a>
			</article>

		</section>
	</article>

	@endsection