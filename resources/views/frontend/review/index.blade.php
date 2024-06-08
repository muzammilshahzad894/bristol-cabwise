@extends('layouts.frontend.app')

@section('content')
<style>
    .card-header {
        background: rgb(245, 169, 29) !important;
        color: white !important;
        font-size: 21px !important;
        font-weight: 500px;
    }
    .side_card{
        height: 100% !important;
    }
    label {
        color: white;
        font-size: 21px;
    }
    .form-control {
        background: white !important;
    }
    .card-body {
        background-color: black !important;
    }
    .button-1{
        width: 100% !important;
    }
    .table-responsive-scroll {
        overflow-x: auto;
    }
    .star-rating {
    display: flex;
    direction: row-reverse;
    justify-content: flex-end;
    font-size: 2rem;
    cursor: pointer;
}

.star {
    transition: color 0.2s;
}

.star:hover,
.star:hover ~ .star {
    color: orange;
}

.star.selected {
    color: orange;
}

    @media (max-width: 768px) {
        .card {
            margin-top: 50px !important;
        }
    }
    .table-responsive-scroll {
        overflow-x: auto;
    }
</style>

<section class="banner-header section-padding bg-img" data-overlay-dark="4"
data-background="{{ asset('frontend-assets/img/slider/booking_img.jpeg') }}">
<div class="v-middle">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 mt-30">
                <div class="post-wrapper">
                    <a href="index-2.html">
                        <div>Home</div>
                    </a>
                    <div class="divider"></div>
                    <div class="text-white"><a href="#">book online</a></div>
                </div>
                <h1>Review page.</h1>
            </div>
        </div>
    </div>
</div>
</section>


<div class="container section-padding">
  
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="section-title">Review<span> *</span></h4>
            <p>We value your feedback and would love to hear about your experience with our service. Your review helps us to continually improve and provide the best possible experience for you and others. Please take a moment to rate our service and share your thoughts with us!</p>
            <div class="card mt-4">
                <div class="card-header">Rate Our Service</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('frontend.reviewPost') }}">
                        @csrf
    
                        <div class="form-group">
                            <label for="rating">Service Rating</label>
                            <div class="star-rating">
                                <input type="hidden" name="rating" id="rating" value="0">
                                <span class="star" data-value="5">&#9733;</span>
                                <span class="star" data-value="4">&#9733;</span>
                                <span class="star" data-value="3">&#9733;</span>
                                <span class="star" data-value="2">&#9733;</span>
                                <span class="star" data-value="1">&#9733;</span>
                            </div>
                        </div>
    
                        <div class="form-group">
                            <label for="review">Review</label>
                            <textarea class="form-control" id="review" name="review" rows="4" required></textarea>
                        </div>
    
                        <button type="submit" class="btn btn-primary button-1">Submit Review</button>
                    </form>
                </div>
            </div>
            
            


          
        </div>
   
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const stars = document.querySelectorAll('.star');
        let selectedRating = 0;

        stars.forEach(star => {
            star.addEventListener('mouseover', function () {
                resetStars();
                highlightStars(this.dataset.value);
            });

            star.addEventListener('mouseout', function () {
                resetStars();
                highlightStars(selectedRating);
            });

            star.addEventListener('click', function () {
                selectedRating = this.dataset.value;
                document.getElementById('rating').value = selectedRating;
                resetStars();
                highlightStars(selectedRating);
            });
        });

        function resetStars() {
            stars.forEach(star => {
                star.classList.remove('selected');
            });
        }

        function highlightStars(rating) {
            stars.forEach(star => {
                if (star.dataset.value <= rating) {
                    star.classList.add('selected');
                }
            });
        }
    });
</script>

@endsection
