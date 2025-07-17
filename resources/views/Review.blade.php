<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Review & Rating | Let's Explore Bangladesh</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0f4c75, #1b262c); 
      color: #333;
    }


    .container {
      max-width: 800px;
      margin: 40px auto;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
      text-align: center;
      font-weight: 600;
      margin-bottom: 25px;
      color: #007bff;
    }

    .rating-stars {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }

    .rating-stars i {
      font-size: 32px;
      color: #ccc;
      cursor: pointer;
      transition: color 0.3s;
    }

    .rating-stars i.hovered,
    .rating-stars i.selected {
      color: #FFD700;
    }

    textarea {
      width: 100%;
      padding: 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 16px;
      resize: vertical;
      min-height: 120px;
      margin-bottom: 20px;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      background: #215c9b;
      color: white;
      font-size: 16px;
      border-radius: 8px;
      transition: background 0.3s;
      cursor: pointer;
    }

    button:hover {
      background: #0056b3;
    }

    .reviews {
      margin-top: 40px;
    }

    .review {
      display: flex;
      align-items: flex-start;
      gap: 15px;
      background: #f9f9f9;
      padding: 15px;
      border-radius: 10px;
      margin-bottom: 20px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .avatar {
      width: 50px;
      height: 50px;
      background: #1f5ea1;
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
      font-size: 18px;
    }

    .review-content {
      flex: 1;
    }

    .review-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 5px;
    }

    .review-name {
      font-weight: 600;
    }

    .review-date {
      font-size: 14px;
      color: #777;
    }

    .review-rating {
      color: #FFD700;
      margin: 5px 0;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Leave a Review</h2>

  <div class="rating-stars" id="starRating">
    <i class="star" data-value="1">&#9733;</i>
    <i class="star" data-value="2">&#9733;</i>
    <i class="star" data-value="3">&#9733;</i>
    <i class="star" data-value="4">&#9733;</i>
    <i class="star" data-value="5">&#9733;</i>
  </div>

  <form>
    <input type="hidden" name="rating" id="ratingValue" value="0" />
    <textarea placeholder="Share your experience with this place..."></textarea>
    <button type="submit">Submit Review</button>
  </form>

  <div class="reviews">
    <div class="review">
      <div class="avatar">A</div>
      <div class="review-content">
        <div class="review-header">
          <span class="review-name">Ayesha Khan</span>
          <span class="review-date">July 16, 2025</span>
        </div>
        <div class="review-rating">&#9733;&#9733;&#9733;&#9733;&#9734;</div>
        <p>Lovely place with amazing views and friendly locals. Highly recommended for a relaxing weekend!</p>
      </div>
    </div>

    <div class="review">
      <div class="avatar">M</div>
      <div class="review-content">
        <div class="review-header">
          <span class="review-name">Mahmudul Hasan</span>
          <span class="review-date">July 10, 2025</span>
        </div>
        <div class="review-rating">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <p>The sunset at Cox’s Bazar is something I'll never forget. Truly magical!</p>
      </div>
    </div>
  </div>
</div>

<script>
  const stars = document.querySelectorAll('.star');
  const ratingInput = document.getElementById('ratingValue');

  stars.forEach((star, index) => {
    star.addEventListener('mouseover', () => {
      stars.forEach((s, i) => {
        s.classList.toggle('hovered', i <= index);
      });
    });

    star.addEventListener('mouseout', () => {
      stars.forEach(s => s.classList.remove('hovered'));
    });

    star.addEventListener('click', () => {
      const rating = star.getAttribute('data-value');
      ratingInput.value = rating;
      stars.forEach((s, i) => {
        s.classList.toggle('selected', i < rating);
      });
    });
  });
</script>

</body>
</html>