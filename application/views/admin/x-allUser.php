<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Created_at</th>
      <th scope="col">location</th>
      <th scope="col">timezone</th>
      <th>action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $no = 1;
      foreach ($user->result() as $usr): ?>
      <tr>
        <th scope="row"><?= $no++ ?></th>
        <td><?= ucwords($usr->userID) ?></td>
        <td><?= ucwords($usr->email) ?></td>
        <td><?= ucwords($usr->first_name) ?></td>
        <td><?= ucwords($usr->last_name) ?></td>
        <td><?= date('d-m-Y',$usr->created_at) ?></td>
        <td><?= ucwords($usr->location) ?></td>
        <td><?= ucwords($usr->timezone) ?></td>
        <td>
          <a href="<?= base_url('admin/passProses/').$usr->userID ?>">Change</a>
        </td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>