<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

use App\ContactRepository;
use App\Database;

$database = new Database();
$repository = new ContactRepository($database->getConnection());
$contacts = $repository->all();

include __DIR__ . '/../includes/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Contact Submissions</h2>
                <a href="/" class="btn btn-primary">New Submission</a>
            </div>

            <div class="card-body">
                <?php if (empty($contacts)): ?>
                    <div class="alert alert-info mb-0">
                        No submissions found.
                    </div>
                <?php else: ?>

                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Submitted</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php foreach ($contacts as $contact): ?>
                                <tr>
                                    <td><?= (int)$contact['id'] ?></td>
                                    <td><?= htmlspecialchars($contact['name']) ?></td>
                                    <td><?= htmlspecialchars($contact['email']) ?></td>
                                    <td><?= htmlspecialchars($contact['phone']) ?></td>
                                    <td><?= nl2br(htmlspecialchars($contact['message'])) ?></td>
                                    <td><?= date('d M Y H:i', strtotime($contact['created_at'])) ?></td>
                                </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>