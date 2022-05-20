<!-- Message Modal -->
		<div class="modal fade" id="chatmodel{{Auth::user()->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
			<div class="modal-dialog modal-dialog-right chatbox" role="document">
				<div class="modal-content chat border-0">
					<div class="card overflow-hidden mb-0 border-0">
						<!-- action-header -->
						<div class="action-header clearfix">
							<ul class="ah-actions actions align-items-center">
								<li>
									<div class="row">
										<div class="col">
											<a href=""  class="" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true"><i class="si si-close text-white"></i></span>
											</a>
										</div>
										<div class="col">
											<h5 class="" style="color: aliceblue; width:150px">تغيير كلمة المرور</h5>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<!-- action-header end -->

						<!-- msg_card_body -->
						<form class="needs-validation was-validated" action="{{ route('settings.changePassword', Auth::user()->id) }}" method="POST">
							<div class="card-body msg_card_body">
								{{ csrf_field() }}
								<div class="row row-sm">
									<div class="col-lg-12">
										<div class="form-group has-success mg-t-20">
											<input class="form-control" placeholder="أدخل كلمة المرور القديمة" name="old_password" required type="password" >
										</div>
										<div class="form-group has-success mg-b-20">
											<input class="form-control" placeholder="أدخل كلمة المرور الجديدة" name="password" required type="password" >
										</div>
										<div class="form-group has-success mg-b-20">
											<input id="password-confirm" class="form-control" placeholder="أعد كتابة كلمة المرور الجديدة" name="password_confirmation" required type="password" >
										</div>
									</div>
								</div>
							</div>
							<!-- msg_card_body end -->
							<!-- card-footer -->
							<div class="card-footer">
								<div class="msb-reply d-flex">
									<div class="input-group">
										<button type="submit" class="btn btn-primary ">
											<i class="fa fa-key" aria-hidden="true"></i>
											تغيير كلمة المرور
										</button>
									</div>
								</div>
							</div><!-- card-footer end -->
						</form>
					</div>
				</div>
			</div>
		</div>
<!-- modal -->
