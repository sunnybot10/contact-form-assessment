<?php
declare(strict_types=1);
require_once __DIR__ . '/../vendor/autoload.php';

use App\Csrf;
use App\Flash;

$flash = Flash::get();
$csrf = Csrf::token();

include __DIR__ . '/../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow">
            <div class="card-header bg-white">
                <h2 class="mb-0">Contact Us</h2>
            </div>
            <div class="card-body">

                <?php if ($flash): ?>
                    <div class="alert alert-<?= htmlspecialchars($flash['type']) ?>">
                        <?= $flash['message'] ?>
                    </div>
                <?php endif; ?>

                <form action="save.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">South African Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="0821234567" required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Message</label>
                        <textarea class="form-control" rows="6" name="message" required></textarea>
                    </div>

                    <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf) ?>">

                    <button type="submit" class="btn btn-primary w-100">
                        Send Message
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>