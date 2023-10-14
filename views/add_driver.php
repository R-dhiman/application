<div id="main-wrapper">
    <div class="container-fluid">
        <div class="row sp">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row justify-content-start sp">
                                <div class="col-4">
                                    <h4>All Jobs</h4>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">Add Jobs</button>
                                </div>
                            </div>
                            <div class="scroll">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead class="table_head">
                                        <tr>
                                            <th>क्र.सं.</th>
                                            <th>नाम</th>
                                            <th>ईमेल</th>
                                            <th>संपर्क सूत्र</th>
                                            <th>दर्जा</th>
                                            <th>कार्य</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($delivered as $row) :
                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row->name; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td><?php echo $row->mobile; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row->status == 0) {
                                                        echo '<p class="badge badge-pill badge-success">Active</p>';
                                                    } else {
                                                        echo '<p class="badge badge-pill badge-danger">Inactive</p>';
                                                    }
                                                    ?></td>
                                                <td>
                                                    <button data-user_id="<?= $row->id ?>" data-name="<?= $row->name ?>" data-email="<?= $row->email; ?>" data-mobile="<?= $row->mobile ?>" type="button" class="btn btn-primary click" data-toggle="modal" data-target="#exampleModal">Update</button>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

    <!-- Modal Update -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="text-center pt-4">Update Jobs</h5>
                <div class="modal-body">
                    <form class="form" method="post" id="form">
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <div class="form-group pt-2">
                            <label>Name : <span class="star">★</span></label>
                            <input type="text" name="name" id="name" placeholder="Enter The Name" class="form-control" style="padding: 15px 12px;" />
                        </div>
                        <div class="form-group pt-2">
                            <label>Email : <span class="star">★</span></label>
                            <input type="email" name="email" id="email" placeholder="Enter The email" class="form-control" style="padding: 15px 12px;" />
                        </div>

                        <div class="form-group pt-2">
                            <label>Contact : <span class="star">★</span></label>
                            <input type="text" name="mobile" id="mobile" placeholder="Enter The mobile" class="form-control" style="padding: 15px 12px;" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update_submit" class="model-btn btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".click").on("click", function() {
                var id = $(this).attr("data-user_id");
                var name = $(this).attr("data-name");
                var email = $(this).attr("data-email");
                var mobile = $(this).attr("data-mobile");
                $("#hidden_id").val(id);
                $("#name").val(name);
                $("#email").val(email);
                $("#mobile").val(mobile);
            });
        });
    </script>