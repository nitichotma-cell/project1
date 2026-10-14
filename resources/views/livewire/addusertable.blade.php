<div>
    <main class="app-main">
        <div class="app-content-header">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Form Validation</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Validation</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <div class="app-content">
          <div class="container-fluid">
            <div class="row g-4">
              <div class="col-12">
                <div class="callout callout-info">
                  Built on
                  <a
                    href="https://getbootstrap.com/docs/5.3/forms/validation/"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="callout-link"
                    >Bootstrap's native form validation</a
                  >
                  — submit each form to see the feedback. The wiring script lives at the bottom of
                  this page.
                </div>
              </div>

              <!-- Custom validation -->
              <div class="col-lg-6">
                <div class="card card-info card-outline mb-4">
                  <div class="card-header">
                    <div class="card-title">Custom Validation</div>
                  </div>
                  <form wire:submit.prevent="adduser" class="needs-validation" novalidate>
                    <div class="card-body">
                      <div class="row g-3">
                        <div class="col-md-6">
                          <label for="validationCustom01" class="form-label">name</label>
                          <input
                            type="text" wire:model="name"
                            class="form-control"
                            id="validationCustom01"
                            value="Mark"
                            required
                          />
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                      
                          <div class="valid-feedback">Looks good!</div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustomUsername" class="form-label">email</label>
                          <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                            <input
                              type="text" wire:model="email"
                              class="form-control"
                              id="validationCustomUsername"
                              aria-describedby="inputGroupPrepend"
                              required
                            />
                            <div class="invalid-feedback">Please choose a username.</div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <label for="validationCustom03" class="form-label">password</label>
                          <input
                            type="text" wire:model="password"
                            class="form-control"
                            id="validationCustom03"
                            required
                          />
                          <div class="invalid-feedback">Please provide a valid city.</div>
                        </div>
                       
                       
                            <label class="form-check-label" for="invalidCheck">
                             
                            </label>
                            <div class="invalid-feedback">You must agree before submitting.</div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-info" type="submit">Submit form</button>
                    </div>
                  </form>
                </div>
              </div>

              <!-- Browser-default validation + tooltips -->
             
            </div>
          </div>
        </div>
      </main>
</div>
