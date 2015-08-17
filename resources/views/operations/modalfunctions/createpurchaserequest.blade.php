<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change Your Account</h4>
            </div>
            <div class="modal-body">
                <form class="form-signin" name="loginform" method="POST" action="#.php">
                    <h6 class="form-signin-heading">Change Your Username or Password</h6>
                    Username: <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus="">
                    <hr>
                    Old Password:
                    <input type="password" id="oldpassword" name="oldpassword" class="form-control" placeholder="Old Password" required>
                    New Password:
                    <input type="password" id="newpassword" name="newpassword" class="form-control" placeholder="New Password" required>
                    Confirm Password:
                    <input type="password" id="conpassword" name="conpassword" onkeyup="checkPass(); return false;" class="form-control" placeholder="Confirm Password" required>
                    <span id="confirmMessage" class="confirmMessage"></span>
                    <div class="modal-footer">
                    <button class="btn btn-lg btn-primary" type="submit" name="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            New Request
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <h6>Create New Purchase Request</h6>
                    <form class="form-signin" name="loginform" method="POST" action="" >
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <table border="1">     
                            <tr>
                                <td>
                                    <div class="col-xs-10">
                                        PR No:
                                    </div>
                                </td>
                                <td>
                                    <div class="col-xs-15">
                                        <input type="text" disabled class="form-control" name="id">
                                    </div>
                                </td>
                                <td>
                                    <div class="col-xs-10">
                                        PR Date:
                                    </div>
                                </td>
                                <td>   
                                    <div class="col-xs-15" >
                                        <input type="date" class="form-control" name="pd_date" value="<?php echo date("Y-m-d");?>">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="col-xs-100">
                                        Department:
                                    </div>
                                </td>
                                <td>
                                    <div class="col-xs-100" style="text-align:right;">
                                        <select class="form-control" name="department" required>
                                            <option value="" disable selected>--Select One--</option>
                                            <option value="">--Select One--</option>
                                            <option value="">--Select One--</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-xs-12">
                                        Requested By:
                                    </div>
                                </td>
                                <td>   
                                    <div class="col-xs-15" >
                                        <input type="text" class="form-control" name="requested_by">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="col-xs-12">
                                        Remarks:
                                    </div>
                                </td>
                                <td colspan="15">       
                                    <div class="col-xs-15" >
                                        <input type="text" class="form-control" name="remarks">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="col-xs-12">
                                        Notes:
                                    </div>
                                </td>
                                <td colspan="15">       
                                    <div class="col-xs-15" >
                                        <input type="text" class="form-control" name="notes">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="15">
                                <div></div>
                                   <div class="col-xs-15" >
                                        <fieldset>
                                            <h6>Request Items</h6>
                                            <table border="1">
                                                <tr>
                                                    <th>Item Description</thead>
                                                    <th>Quantity</thead>
                                                    <th>UOM</thead>
                                                    <th>Date Needed</thead>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="col-xs-15" >
                                                            <input type="text" id="description" class="form-control" name="description">
                                                            <datalist id="description">
                                                                @foreach ($itemlist as $item)
                                                                <option value="{{$item->id}}">{{$item->description}}</option>
                                                                @endforeach
                                                            </datalist>
                                                        </div>
                                                    </td>
                                                    <td width="10%">
                                                        <div class="col-xs-15" >
                                                            <input type="text" class="form-control" name="qty">
                                                        </div>
                                                    </td>
                                                    <td width="20%">
                                                        <div class="col-xs-15" align="center">
                                                            <select class="uom form-control" name="uom">
                                                            </select>
                                                        <div id="load" data-load='{!! $items !!}'></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-xs-13" >
                                                            <input type="date" class="form-control" name="pd_date" value="<?php echo date("Y-m-d");?>">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </fieldset>
                                    </div>
                                </td>
                            </tr>              
                        </table><br>
                            <button class="btn btn-lg btn-primary btn-sm" type="submit">Update Info</button>
                    </form>
            </div>
        </div>
    </div>
</div>
