<?php
$servername = "localhost";
$username = "db_admin";
$password = "Teju143!";
$db_name = 'add_employee';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


if (isset($_POST['btn_add_employee'])) {

    $reg_date = date('Y-m-d h:i:s');

    $add_emp = $conn->prepare("INSERT INTO `add_employee`.`emp_data` (`role`, `first_name`, `last_name`, `gender`, `office_emil`, `per_email`, `mobile`, `alt_mobile`, `watsap_number`, `password`, `address`, `land_mark`, `city`, `state`, `pin_code`, `ctc`, `bank_name`, `bank_account_num`, `bank_ifsc`, `pan`, `design`, `work_location`, `reg_date`) "
            . "VALUES (:role, :fname, :lname, :gender, :officemail, :permail, :mobile, :alt_mobile, :watsap, :pass, :address, :land_mark, :city, :state, :pin_code, :ctc, :bank_name, :account_num, :bank_ifsc, :pan, :design, :work_location, :reg_date)");

    $add_emp->bindValue(':role', $_POST['role']);
    $add_emp->bindValue(':fname', $_POST['fname']);
    $add_emp->bindValue(':lname', $_POST['lname']);
    $add_emp->bindValue(':gender', $_POST['gender']);
    $add_emp->bindValue(':officemail', $_POST['officeEmial']);
    $add_emp->bindValue(':permail', $_POST['perEmail']);
    $add_emp->bindValue(':mobile', $_POST['mobile']);
    $add_emp->bindValue(':alt_mobile', $_POST['altMobile']);
    $add_emp->bindValue(':watsap', $_POST['watsapNumber']);
    $add_emp->bindValue(':pass', $_POST['paswd']);
    $add_emp->bindValue(':address', $_POST['address']);
    $add_emp->bindValue(':land_mark', $_POST['landMark']);
    $add_emp->bindValue(':city', $_POST['city']);
    $add_emp->bindValue(':state', $_POST['state']);
    $add_emp->bindValue(':pin_code', $_POST['pin']);
    $add_emp->bindValue(':ctc', $_POST['ctc']);
    $add_emp->bindValue(':bank_name', $_POST['bankName']);
    $add_emp->bindValue(':account_num', $_POST['bankAccountNumber']);
    $add_emp->bindValue(':bank_ifsc', $_POST['bankifsc']);
    $add_emp->bindValue(':pan', $_POST['pan']);
    $add_emp->bindValue(':design', $_POST['designation']);
    $add_emp->bindValue(':work_location', $_POST['workLocation']);
    $add_emp->bindValue(':reg_date', $reg_date);

    $add_emp->execute();

    $emp_id = $conn->lastInsertId();

    $total_files = count($_FILES['doc']['name']);
//    echo '<pre>';;
//    print_r($_FILES);
//    echo '</pre>';

    for ($i = 0; $i < $total_files; $i++) {
        $tmpFilePath = $_FILES['doc']['tmp_name'][$i];
        if ($tmpFilePath != "") {
            $newFilePath = "docs/" . $_FILES['doc']['name'][$i];
            move_uploaded_file($tmpFilePath, $newFilePath);
            $inser_doc_data = $conn->prepare("insert into doc_table (`emp_id`,`doc_path`) values(:emp_id, :doc_path)");
            $inser_doc_data->bindValue(':emp_id', $emp_id);
            $inser_doc_data->bindValue(':doc_path', $newFilePath);
            $inser_doc_data->execute();
        }
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <title>Add Employee</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-2 p-3 bg-primary">
                    <h5>Total Employees</h5>
                    <?php
                    $get_total_employees = $conn->prepare("select count(*) as total_employees from emp_data");
                    $get_total_employees->execute();
                    $emp_count = $get_total_employees->fetch(PDO::FETCH_ASSOC);
                    echo '<h5>' . $emp_count['total_employees'] . '<h5>';
                    ?>
                </div>
                <div class="col-2 p-3 bg-success">
                    <h5>Total Managers</h5>
                    <?php
                    $get_total_employees = $conn->prepare("select count(*) as total_employees from emp_data where role = 'manager'");
                    $get_total_employees->execute();
                    $emp_count = $get_total_employees->fetch(PDO::FETCH_ASSOC);
                    echo '<h5>' . $emp_count['total_employees'] . '<h5>';
                    ?>
                </div>
                <div class="col-2 p-3 bg-warning">
                    <h5>Total Executives</h5>
                    <?php
                    $get_total_employees = $conn->prepare("select count(*) as total_employees from emp_data where role = 'execute'");
                    $get_total_employees->execute();
                    $emp_count = $get_total_employees->fetch(PDO::FETCH_ASSOC);
                    echo '<h5>' . $emp_count['total_employees'] . '<h5>';
                    ?>
                </div>
                <div class="col-2 p-3 bg-danger">
                    <h5>Total Male Executives</h5>
                    <?php
                    $get_total_employees = $conn->prepare("select count(*) as total_employees from emp_data where role = 'execute' and gender = 'male'");
                    $get_total_employees->execute();
                    $emp_count = $get_total_employees->fetch(PDO::FETCH_ASSOC);
                    echo '<h5>' . $emp_count['total_employees'] . '<h5>';
                    ?>
                </div>
                <div class="col-2 p-3 bg-default">
                    <h5>Total FeMale Executives</h5>
                    <?php
                    $get_total_employees = $conn->prepare("select count(*) as total_employees from emp_data where role = 'execute' and gender = 'female'");
                    $get_total_employees->execute();
                    $emp_count = $get_total_employees->fetch(PDO::FETCH_ASSOC);
                    echo '<h5>' . $emp_count['total_employees'] . '<h5>';
                    ?>
                </div>
                <div class="col-2 p-3 bg-success">
                    <h5>Total Male Managers</h5>
                    <?php
                    $get_total_employees = $conn->prepare("select count(*) as total_employees from emp_data where role = 'manager' and gender = 'male'");
                    $get_total_employees->execute();
                    $emp_count = $get_total_employees->fetch(PDO::FETCH_ASSOC);
                    echo '<h5>' . $emp_count['total_employees'] . '<h5>';
                    ?>
                </div>
                <div class="col-2 p-3 bg-primary">
                    <h5>Total FeMale Managers</h5>
                    <?php
                    $get_total_employees = $conn->prepare("select count(*) as total_employees from emp_data where role = 'manager' and gender = 'female'");
                    $get_total_employees->execute();
                    $emp_count = $get_total_employees->fetch(PDO::FETCH_ASSOC);
                    echo '<h5>' . $emp_count['total_employees'] . '<h5>';
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="offset-3 col-6">
                    <!--<a class="btn btn-primary" href="add_emp_form.php">Add Employee</a>--> 
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addEmpModel">
                        Add Employee
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addEmpModel" tabindex="-1" aria-labelledby="addEmpModel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group ">
                                                    <select name="role" id="role" class="form-control" onchange="return fetchDesign();">
                                                        <option>Select role</option>
                                                        <?php
                                                        $get_role = $conn->prepare("SELECT distinct type_of_design FROM designation");
                                                        $get_role->execute();
                                                        $role_name = $get_role->fetchAll(PDO::FETCH_ASSOC);
                                                        foreach ($role_name as $role) {
                                                            ?>
                                                            <option value="<?php echo $role['type_of_design'] ?>"><?php echo strtoupper($role['type_of_design']) ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="fname" class="form-control" placeholder="First Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                                </div>
                                                <div class="form-group">
                                                    <select name="gender" class="form-control">
                                                        <option>Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Fe Male</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="officeEmial" class="form-control" placeholder="Office Emial">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="perEmail" class="form-control" placeholder="Personal Emial">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="mobile" class="form-control" placeholder="Mobile Number">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="altMobile" class="form-control" placeholder="Alternate Mobile Number">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="watsapNumber" class="form-control" placeholder="Watsap Number">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="paswd" class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="confPaswd" class="form-control" placeholder="Conform Password">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <textarea name="address" class="form-control" rows="5" placeholder="Address"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="landMark" class="form-control" placeholder="Land Mark">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="city" class="form-control" placeholder="City">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="state" class="form-control" placeholder="State">
                                                </div>
                                                <div class="form-group">
                                                    <input type="number" name="pin" class="form-control" placeholder="Pin Code">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="ctc" class="form-control" placeholder="CTC (Annual Pckege)">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="bankName" class="form-control" placeholder="Bank Name">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="bankAccountNumber" class="form-control" placeholder="Bank Account Number">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="bankifsc" class="form-control" placeholder="Bank IFSC">
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="pan" class="form-control" placeholder="PAN Number">
                                                </div>
                                                <div class="form-group">
                                                    <select name="designation" id="desgn" class="form-control">
                                                        <option>Select Designation </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="text" name="workLocation" class="form-control" placeholder="Work Location">
                                                </div>
                                            </div>
                                            <div class="col-10" id="file_upload_div">
                                                <div class="form-group">
                                                    <input type="file" name="doc[]" class="form-control-file" multiple> 
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-primary" id="addMoreDocs">Add More Dcos</button>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" name="btn_add_employee" value="Add Employee" class="btn btn-primary">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <table class="table table-bordered">
                        <tr>
                            <th>S. No</th>
                            <th>Emp ID</th>
                            <th>Employee Name</th>
                            <th>Role</th>
                            <th>Designation</th>
                            <th>Mobile Numbers</th>
                            <th>Email (Official)</th>
                            <th>Reg. Date</th>
                            <th>Documents</th>
                            <th>Action</th>
                            <th>Status</th>                            
                        </tr>
                        <?php
                        $i = 1;
                        $get_emp_data = $conn->prepare("select * from emp_data");
                        $get_emp_data->execute();
                        $emp_data = $get_emp_data->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($emp_data as $emp_data) {
                            ?>
                            <tr>
                                <th><?php echo $i ?></th>
                                <th><?php echo $emp_data['id'] ?></th>
                                <th><?php echo $emp_data['first_name'] . ' ' . $emp_data['last_name'] ?></th>
                                <th><?php echo $emp_data['role'] ?></th>
                                <th><?php echo $emp_data['design'] . ' ' . $emp_data['role'] ?></th>
                                <th>
                                    <?php echo $emp_data['mobile'] ?>
                                    <br>
                                    <?php echo $emp_data['alt_mobile'] ?>
                                    <br>
                                    <?php echo $emp_data['watsap_number'] ?>
                                </th>
                                <th><?php echo $emp_data['office_emil'] ?></th>
                                <th><?php echo date('d-m-Y', strtotime($emp_data['reg_date'])) ?></th>
                                <th>Documents</th>
                                <th>Action</th>
                                <th>Status</th>  
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <script src="jquery-3.6.0.js" type="text/javascript"></script>
        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
        -->

        <script>
//            Add File Upload Field
//                      <input type="file" name="doc${fileCount}" class="form-control-file">
                                                        let fileCount = 1;
                                                        document.querySelector('#addMoreDocs').addEventListener('click', function (e) {
                                                            e.preventDefault();
                                                            fileCount++;
                                                            const fileUpload = `
                <div class="form-group">

                              <input type="file" name="doc[]" class="form-control-file">
                </div>
                `;
                                                            document.querySelector('#file_upload_div').innerHTML += fileUpload;

                                                        })

//            Featch Designation Function
                                                        function fetchDesign() {
                                                            let role = $('#role').val();
                                                            $.ajax({
                                                                type: 'post',
                                                                url: 'get_desgn.php',
                                                                data: 'role=' + role,
                                                                success: function (data) {
                                                                    let dataArray = $.parseJSON(data)
                                                                    let desgnOptions = '';
                                                                    $.each(dataArray, function (key, value) {
                                                                        let desgn = value;
                                                                        desgnOptions += `
                         <option value=${value.desn}>${value.desn}</option>
                            `;

                                                                    });
                                                                    console.log(desgnOptions);
                                                                    $('#desgn').html(desgnOptions);

                                                                }
                                                            });
                                                        }
        </script>
    </body>
</html>