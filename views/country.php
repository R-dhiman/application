
</style>

<div id="main-wrapper">
    <div class="container-fluid">
        <div class="row sp">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="container-fluid">
                            <div class="row justify-content-start sp">
                                <div class="col-4">
                                    <h4>All Country</h4>
                                </div>
                                <div class="col-8 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter">Add Country</button>
                                </div>
                            </div>
                            <div class="scroll">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead class="table_head">
                                        <tr>
                                            <th>S no.</th>
                                            <th>Country Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($country as $row) :
                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $row->country_name; ?></td>
                                                <!-- <td><?php echo $row->status; ?></td> -->
                                                <td>
                                                    <?php
                                                    if ($row->status == 0) {
                                                        echo '<p class="active-pills">Active</p>';
                                                    } else {
                                                        echo '<p class="inactive-pills">Inactive</p>';
                                                    }
                                                    ?></td>
                                                <td>
                                                    <!-- <a href="?sid=<?= $row->id; ?>"><?= $row->status == 0 ? "<i class='inactive fa-solid fa-ban bg-dark' data-toggl='tooltip' data-placement='top' title='Mark Inactive'></i>" :  "<i class='active fas fa-circle-check' data-toggl='tooltip' data-placement='top' title='Mark Active'></i>"; ?></a> -->
                                                    <!-- <a href=""><i data-id="<? $row->id?>" data-country-name= "<?= $row->country_name?>" class="square fa-solid fa-pen-to-square click" data-toggl="tooltip" data-placement="top" title="Update" data-toggle="modal" data-target="#exampleModal"></i>update</a> -->
                                                    <button data-id="<?= $row->id?>" data-country-name= "<?= $row->country_name?>" class="btn btn-dark btn-sm click" data-toggle="modal" data-target="#exampleModal">Update</button>
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
                <h5 class="text-center pt-4">Country</h5>
                <div class="modal-body">
                    <form class="form" method="post" id="form">
                        <input type="hidden" name="hidden_id"/>
                        <div class="form-group pt-2">
                            <label>Country Name : <span class="star">★</span></label>
                            <input type="text" name="country_name"  placeholder="Enter The Name" class="form-control" style="padding: 15px 12px;"required />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit" class="model-btn btn-info btn-sm">Submit</button>
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
                <h5 class="text-center pt-4">Country</h5>
                <div class="modal-body">
                    <form class="form" method="post" id="form">
                        <input type="hidden" name="hidden_id" id="hidden_id"/>
                        <div class="form-group pt-2">
                            <label>Country Name : <span class="star">★</span></label>
                            <input type="text" name="country_name" id="country_name" placeholder="Enter The Name" class="form-control" style="padding: 15px 12px;" required />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="update_submit" class="model-btn btn-info btn-sm">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".click").on("click", function(){
                var id = $(this).attr("data-id");
                var country_name = $(this).attr("data-country-name");
                $("#hidden_id").val(id);
                $("#country_name").val(country_name);
            });
        });
    </script>