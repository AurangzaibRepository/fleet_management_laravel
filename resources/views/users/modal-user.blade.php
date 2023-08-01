<div class="modal" id="modal-user">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-5"><img class="img-user" src="{{asset('/images/leaf-icon.png')}}"></img></div>
                    <div class="col-7 dv-user-info">
                        <span id="name"></span><br />
                        <span>Country - <span id="country">Nicaragua</span></span>
                    </div>
                </div>
                <br />
                <table id="tbl-user-info">
                    <tbody>
                        <tr>
                            <td>Date of Joining</td>
                            <td><span id="registered-date"></span></td>
                        </tr>
                        <tr>
                            <td>Last Active</td>
                            <td><span id="last-active"></span></td>
                        </tr>
                        <tr>
                            <td>Phone number</td>
                            <td><span id="phone-no"></span></td>
                        </tr>
                    </tbody>

                </table>
            </div> <!-- modal body -->
        </div> <!-- modal-content -->
    </div>
</div>