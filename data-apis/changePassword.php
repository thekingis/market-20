<form onsubmit="updatePassword(this, event)">
  <input type="hidden" name="action" value="changePassword">
  <div class="mb-3">
    <label for="oldPassword" class="form-label">Old Password</label>
    <input type="password" class="form-control" id="oldPassword" name="oldPassword" required />
  </div>
  <div class="mb-3">
    <label for="newPassword" class="form-label">New Password</label>
    <input type="password" class="form-control" id="newPassword" name="newPassword" required />
  </div>
  <div class="mb-3">
    <label for="confirmPassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="confirmPassword" required />
  </div>
  <div class="my-2 bg-danger text-white mw-100 p-2 d-none" id="errorDiv"></div>
  <button type="submit" class="btn btn-primary bg-primary">Save</button>
</form>