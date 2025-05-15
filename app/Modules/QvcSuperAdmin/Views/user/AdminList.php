<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>List Of SAMC Admin</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Active Date</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Verification Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admin_list as $admin) : ?>
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div>
                                                <img src="<?= !empty($admin->qa_image) ? $admin->qa_image : base_url('assets/img/icons/profile.jpg'); ?>"
                                                    class="avatar me-3"
                                                    alt="image">

                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?= $admin->qa_name ?></h6>
                                                <p class="text-sm font-weight-bold text-secondary mb-0"><?= get_university_name($admin->qa_qu_id) ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0"><?= $admin->qa_email ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <p class="text-sm font-weight-bold mb-0"><?= date('d/m/Y', strtotime($admin->qa_start_date)) ?> - <?= date('d/m/Y', strtotime($admin->qa_expired_date)) ?></p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <?php if ($admin->qa_verification == 't' || $admin->qa_verification == true): ?>
                                            <span class="badge bg-success">Verified</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Not Verified</span>
                                        <?php endif; ?>
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