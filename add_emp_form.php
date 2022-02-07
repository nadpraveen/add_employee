<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <title>Hello, world!</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group ">
                                    <select name="role" class="form-control">
                                        <option>Select role</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="fname" class="form-control" placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lname" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <select name="role" class="form-control">
                                        <option>Select role</option>
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
                                    <input type="text" name="bankIFSC" class="form-control" placeholder="Bank IFSC">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="pan" class="form-control" placeholder="PAN Number">
                                </div>
                                <div class="form-group">
                                    <select name="designation" class="form-control">
                                        <option>Select Designation </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="workLocation" class="form-control" placeholder="Work Location">
                                </div>
                            </div>
                            <div class="col-10">
                                <div class="form-group">
                                    <input type="file" name="doc1" class="form-control-file">
                                </div>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" id="addMoreDocs">Add More Dcos</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
        -->

        <script>
            document.querySelector('#addMoreDocs').addEventListener('click', function (e) {
                e.preventDefault();
                console.log('clicked');
            })
        </script>
    </body>
</html>