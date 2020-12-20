<link rel="stylesheet" href="css/dangnhap.css">
<section id="form_dangki"><!--form-->
  <div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="panel with-nav-tabs panel-info">
              <div class="panel-heading">
                 <h1 id="td_dangki">SHOES SHOP</h1>
              </div>

              <div class="panel-body">
                 <div class="tab-content">
                    <div id="login" >
                       <div class="container-fluid">
                        <div class="row">
                           <hr />
                        <form action="index.php?p=xulidangki" method="POST">
                          <div class="row">
                                <div class="dangki_thongtin"><label for="name" class="cols-sm-2 control-label">Họ & tên</label>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                   <div class="form-group">
                                      <div class="input-group">
                                         <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                         </div>
                  
                                        <input type="text" name="txtUserName" class="form-control" required placeholder="Nhập họ tên của bạn.">
                                      </div>
                                   </div>
                                </div>
                          </div>

                          <div class="row">
                               <div class="dangki_thongtin"><label for="name" class="cols-sm-2 control-label">Email</label>
                               </div>

                               <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="form-group">
                                     <div class="input-group">
                                        <div class="input-group-addon">
                                           <span class="glyphicon glyphicon-envelope"></span>
                                        </div>

                                        <input required type="email" class="form-control" placeholder="Nhập email của bạn" name="txtEmail" class="form-control">
                                     </div>
                                  </div>
                              </div>
                          </div>

                          <div class="row">
                            <div class="dangki_thongtin"><label for="name" class="cols-sm-2 control-label">Số điện thoại</label></div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                             <div class="form-group">
                                <div class="input-group">
                                   <div class="input-group-addon">
                                      <span class="glyphicon glyphicon-phone"></span>
                                   </div>

                                   <input type="number" required placeholder="Nhập số điện thoại của bạn" name="txtSDT" class="form-control">
                                </div>
                             </div>
                            </div>
                          </div>

                          <div class="row">
                              <div class="dangki_thongtin"><label for="name" class="cols-sm-2 control-label">Mật khẩu</label></div>
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   
                                   <div class="input-group">
                                      <div class="input-group-addon">
                                         <span class="glyphicon glyphicon-lock"></span>
                                      </div>

                                      <input type="password"  required placeholder="Nhập mật khẩu" name="txtPassword1" class="form-control">
                                   </div>
                                   
                                </div>
                             </div>
                          </div>

                          <div class="row">
                               <div class="dangki_thongtin"><label for="name" class="cols-sm-2 control-label">Xác nhận mật khẩu</label></div>
                               <div class="col-xs-12 col-sm-12 col-md-12">
                                 <div class="form-group">
                                    
                                    <div class="input-group">
                                       <div class="input-group-addon">
                                          <span class="glyphicon glyphicon-lock"></span>
                                       </div>

                                       <input type="password"  required placeholder="Nhập lại mật khẩu." name="txtPassword2" class="form-control">
                                    </div>
                                    
                                 </div>
                              </div>
                          </div>
           
                          <div class="row">
                            <div class="dangki_thongtin"><label for="name" class="cols-sm-2 control-label">Địa chỉ</label></div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <div class="form-group">
                                
                                  <div class="input-group">
                                     <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-map-marker"></span>
                                     </div>

                                     <textarea required class="form-control" rows="5" id="comment" name="txtDiaChi" placeholder="Nhập địa chỉ của bạn."></textarea>
                                  </div>
                                  
                               </div>
                            </div>
                          </div>
                         
           
                          <hr />
                          <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                               <button type="submit" name="btn_dangki" class="btn btn-success btn-block btn-lg"> Đăng kí </button> 
                            </div>
                          </div>
                        </form>


                    </div>
                 </div>
          </div>
        </div>
      </div>
  </div>
</section><!--/form-->
