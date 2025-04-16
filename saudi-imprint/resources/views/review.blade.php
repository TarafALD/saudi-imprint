<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Review</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .review-container {
            max-width: 600px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 10px;
            background: rgb(239, 244, 235);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .star-rating i {
            font-size: 2rem;
            color: #ccc;
            cursor: pointer;
        }
        .star-rating i.selected,
        .star-rating i:hover,
        .star-rating i:hover ~ i {
            color: gold;
        }
    </style>
</head>
<body>

<div class="review-container">
    <h3 class="text-center mb-4">Rate Your Experience</h3>
    <form>
        <div class="mb-4 text-center">
            <label class="form-label d-block mb-2">Rate the Tour Guide?</label>
            <div class="star-rating" id="starRating">
                <i class="bi bi-star" data-value="1"></i>
                <i class="bi bi-star" data-value="2"></i>
                <i class="bi bi-star" data-value="3"></i>
                <i class="bi bi-star" data-value="4"></i>
                <i class="bi bi-star" data-value="5"></i>
            </div>
            <input type="hidden" name="rating" id="ratingInput" required>
        </div>
        <div class="mb-4">
            <label for="comment" class="form-label">Comment (optional)</label>
            <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Tell us what you think about the tour.."></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const stars = document.querySelectorAll('#starRating i');
    const ratingInput = document.getElementById('ratingInput');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const value = star.getAttribute('data-value');
            ratingInput.value = value;

            stars.forEach(s => {
                s.classList.remove('selected');
                if (s.getAttribute('data-value') <= value) {
                    s.classList.add('selected');
                }
            });
        });
    });
</script>

</body>
</html>
