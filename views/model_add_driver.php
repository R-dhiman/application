<!-- Modal Insert -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center pt-4">Insert Jobs</h5>
                <div class="modal-body">
                    <form class="form" method="post" id="form">
                        <input type="hidden" name="hidden_id" />
                        <div class="form-group pt-2">
                            <label>Name : <span class="star">★</span></label>
                            <input type="text" name="name" placeholder="Enter The Name" class="form-control" style="padding: 15px 12px;" />
                        </div>

                        <div class="form-group pt-2">
                            <label>Email : <span class="star">★</span></label>
                            <input type="email" name="email" placeholder="Enter The email" class="form-control" style="padding: 15px 12px;" />
                        </div>
                        <div class="form-group pt-2">
                            <label>Password : <span class="star">★</span></label>
                            <input type="password" name="password" id="password" placeholder="Enter The password" class="form-control" style="padding: 15px 12px;" />
                        </div>
                        <div class="form-group pt-2">
                            <label>Contact : <span class="star">★</span></label>
                            <input type="text" name="mobile" placeholder="Enter The mobile" class="form-control" style="padding: 15px 12px;" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="model-btn btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>