<style>
/* Global Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa;
    color: #333;
}

.container {
    max-width: 1140px;
}

/* Article Card Styles */
.article-card {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin: 20px 0;
}

.article-image img {
    border-radius: 10px;
    width: 100%;
    height: auto;
    object-fit: cover;
}

.article-title {
    font-size: 2rem;
    font-weight: bold;
    color: #343a40;
    margin-bottom: 10px;
}

.article-description {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #6c757d;
    margin-bottom: 20px;
}

.article-price,
.article-created,
.article-views {
    font-size: 1rem;
    color: #495057;
    margin-bottom: 10px;
}

.article-price strong {
    color: #28a745;
}

/* Button Styles */
.buy-button .btn {
    font-size: 1.2rem;
    background-color: #007bff;
    border-color: #007bff;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.buy-button .btn:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.buy-button .btn:focus {
    box-shadow: none;
}

/* Responsive Styles */
@media (max-width: 767px) {
    .article-card {
        padding: 15px;
    }

    .article-title {
        font-size: 1.8rem;
    }

    .article-description {
        font-size: 1rem;
    }

    .buy-button .btn {
        font-size: 1rem;
    }
}
</style>

<div class="container mt-5">
    <div class="row">
        <!-- Article Details -->
        <div class="col-12">
            <figure class="tm-video-item">
            <img src="<?= $this->Url->build('/img/uploads/' . h($article['image']), ['fullBase' => true]) ?>" alt="<?= h($article['name']) ?>" class="img-fluid">

                <figcaption class="d-flex align-items-center justify-content-center">
                    <h2><?= h($article['name']) ?></h2>
                </figcaption>
            </figure>
            <div class="article-info mt-4">
                <p><strong>Description:</strong> <?= h($article['description']) ?></p>
                <p><strong>Price:</strong> <?= number_format($article['price'], 2) ?> FCFA</p>
                <p><strong>Views:</strong> <?= number_format($article['views']) ?> views</p>
            </div>
            <div class="mt-4">
                <form action="<?= $this->Url->build(['controller' => 'Articles', 'action' => 'buy', $article['id']]) ?>" method="POST">
                    <button type="submit" class="btn btn-primary">Buy Now</button>
                </form>
            </div>
        </div>
    </div>
</div>
