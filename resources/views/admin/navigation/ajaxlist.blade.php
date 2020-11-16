                              <!--数据列表-->
                              <table id="dataList" class="table table-bordered table-striped table-hover dataTable">
                                  <thead>
                                      <tr>
                                          <th class="sorting_asc">导航栏ID</th>
                                          <th class="sorting">导航栏名称</th>
                                          <th class="sorting">导航栏地址</th>
                                          <th class="sorting">是否展示</th>
                                          <th class="sorting">添加时间</th>                                                      
                                          <th class="text-center">操作</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($name as $k=>$a)
                                    <tr>
                                      <td>{{$a->nav_id}}</td>
                                      <td>{{$a->nav_name}}</td>
                                      <td>{{$a->nav_url}}</td>
                                      <td>{{$a->is_show==1?'是':'否'}}</td>
                                      <td>{{date('Y-m-d H:i:s',$a->add_time)}}</td>
                                      <td>
                                        <button type="button" class="btn bg-olive btn-xs del" nav_id='{{$a->nav_id}}'>删除</button>   
                                        <button type="button" class="btn bg-olive btn-xs upd" nav_id='{{$a->nav_id}}'>修改</button>  
                                      </td>
                                    </tr>
                                    @endforeach
                                    <td colspan="6">
                                          <center>{{$name->links()}}</center>
                                    </td>
                                  </tbody>
                              </table>
                              <!--数据列表/-->    