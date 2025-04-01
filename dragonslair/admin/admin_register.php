<!-- Registration 4 - Bootstrap Brain Component -->

<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet"
  href="https://unpkg.com/bs-brain@2.0.4/components/registrations/registration-4/assets/css/registration-4.css">

<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6">
          <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy"
            src="./assets/img/logo-img-1.webp" alt="BootstrapBrain Logo">
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <form action="phpcode/ad_process.php" method="POST">
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="firstName" class="form-label">First Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="firstname" id="firstName" placeholder="First Name"
                    required>
                </div>
                <div class="col-12">
                  <label for="lastName" class="form-label">Last Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="lastname" id="lastName" placeholder="Last Name"
                    required>
                </div>
                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com"
                    required>
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="pass" id="password" required>
                </div>

                <!-- New field for Company Name -->
                <div class="col-12">
                  <label for="companyName" class="form-label">Company Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="companyname" id="companyName" placeholder="Company Name"
                    required>
                </div>

                <label for="adminType" class="form-label">Admin Type <span class="text-danger">*</span></label>
                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal"
                  data-bs-target="#adminTypeModal">
                  Choose Admin Type
                </button>
                <input type="hidden" name="admin_type" id="adminType" required>


                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="iAgree" id="iAgree" required>
                    <label class="form-check-label text-secondary" for="iAgree">
                      I agree to the <a href="#!" class="link-primary text-decoration-none">terms and conditions</a>
                    </label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-primary" type="submit">Sign up</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Admin Type Selection Modal -->
  <div class="modal fade" id="adminTypeModal" tabindex="-1" aria-labelledby="adminTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="adminTypeModalLabel">Select Admin Type</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="adminType" id="superadmin" value="superadmin" required>
            <label class="form-check-label" for="superadmin">Super Admin</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="adminType" id="admin" value="admin" required>
            <label class="form-check-label" for="admin">Admin</label>
          </div>

          <div class="text-danger" id="adminTypeError" style="display:none;">Please select an admin type.</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="confirmAdminType">Confirm</button>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://unpkg.com/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#confirmAdminType').on('click', function () {
        const selectedAdminType = $('input[name="adminType"]:checked');
        const adminTypeError = $('#adminTypeError');

        if (selectedAdminType.length === 0) {
          adminTypeError.show();
        } else {
          adminTypeError.hide();
          $('#adminType').val(selectedAdminType.val());
          $('#adminTypeModal').modal('hide'); // Hide modal
        }
      });
    });
  </script>

</section>