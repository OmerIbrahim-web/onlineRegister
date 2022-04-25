@extends('layouts.master')
@section('css')
@toastr_css
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الصلاحيات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمة الصلاحيات</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
								<div class="d-flex justify-content-between">
									<div class="col-lg-12 margin-tb">
										<div class="pull-right">
											@can('role-create')
												<a class="btn btn-primary btn-sm effect-scale" href="#modaldemo8" data-toggle="modal" data-effect="effect-scale">اضافة</a>
											@endcan
											<button type="button" class="btn btn-primary btn-sm" id="btn-delete_all">
												حذف الصفوف المختارة
											</button>
										</div>
									</div>
									<br>
								</div>
				
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table mg-b-0 text-md-nowrap table-hover " id="datatable">
										<thead>
											<tr>
												<th><input type="checkbox" name="chekckAll" id="select-all" onclick="checkAll('box1', this)"></th>
												<th>#</th>
												<th>الاسم</th>
												<th>العمليات</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($permissions as $key => $permission)
												<tr>
													<td><input type="checkbox" value="{{$permission->id}}" class="box1" name="check-item" id=""></td>
													<td>{{ ++$key }}</td>
													<td>{{ $permission->name }}</td>
													<td>
														@can('permission-edit')
															<a class="btn btn-primary btn-sm" data-toggle="modal"
																href="#edit{{ $permission->id }}">تعديل</a>
														@endcan
														{{--  --}}
														@if ($permission->name !== 'Admin')
															@can('permission-delete')
																{!! Form::open(['method' => 'DELETE', 'route' => ['admin.permissions.destroy',
																$permission->id], 'style' => 'display:inline']) !!}
																{!! Form::submit('حذف', ['class' => 'btn btn-danger btn-sm']) !!}
																{!! Form::close() !!}
															@endcan
														@endif
				
				
													</td>
												</tr>
												<!-- edit modal -->
												<div class="modal" id="edit{{ $permission->id }}">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content modal-content-demo">
															<div class="modal-header">
																<h6 class="modal-title">تعديل الصلاحية</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
															</div>
															<form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
																{{ csrf_field() }}
																@method('put')
																<div class="modal-body">
																	<label for="">إسم الصلاحية</label>
																	<input type="text" name="name" value="{{ $permission->name }}" class="form-control">
																</div>
																<div class="modal-footer">
																	<button class="btn ripple btn-primary btn-sm" type="submit">حفظ</button>
																	<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
																</div>
															</form>
														</div>
													</div>
												</div>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<!-- delete all Modal -->
					<div class="modal" id="deleteAll">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">حذف الصفوف المختارة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<form action="{{ route('admin.deleteAll') }}" method="POST">
									{{ csrf_field() }}
									<div class="modal-body">
										<h6 class="text-danger">هل أنت متأكد من عملية الحذف ؟</h6>
										<input type="hidden" name="ids" id="delete_all_id">
									</div>
									<div class="modal-footer">
										<button class="btn ripple btn-primary btn-sm" type="submit">حذف الكل</button>
										<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- End Modal effects-->

						<!-- add modal -->
						<div class="modal" id="modaldemo8">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content modal-content-demo">
									<div class="modal-header">
										<h6 class="modal-title">إضافة صلاحية جديدة</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
									</div>
									<form action="{{ route('admin.permissions.store') }}" method="POST">
										{{ csrf_field() }}
										<div class="modal-body">
											<label for="">إسم الصلاحية</label>
											<input type="text" name="name" class="form-control">
										</div>
										<div class="modal-footer">
											<button class="btn ripple btn-primary btn-sm" type="submit">حفظ</button>
											<button class="btn ripple btn-secondary btn-sm" data-dismiss="modal" type="button">إلغاء</button>
										</div>
									</form>
								</div>
							</div>
						</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

@jquery
@toastr_js
@toastr_render

<script>
	function checkAll(className, elem)
	{
		var elements = document.getElementsByClassName(className);
		var l = elements.length;

		if(elem.checked)
		{
			for(var i=0; i < l; i++)
			{
				elements[i].checked = true;
			}
		}else{
			for(var i=0; i < l; i++)
			{
				elements[i].checked = false;
			}
		}
	}
</script>

<script>
	$(function(){
		$('#btn-delete_all').click(function(){
			var selected = new Array();
			$('#datatable input[type="checkbox"]:checked').each(function(){
				selected.push(this.value);
			});
			if(selected.length > 0)
			{
				$('#deleteAll').modal('show')
				$('input[id="delete_all_id"]').val(selected);
			}
		});
	});
</script>
@endsection