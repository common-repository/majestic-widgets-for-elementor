(function($) {
    $(document).ready(function() {

        $('#contact-details-form').on('submit', function(e) {
            e.preventDefault();

            const formData = $(this).serialize();

            $('.contact-details-form').hide();
            $('.majestic-educational-quiz').show();
        });

        const $questions = $('.quiz-question');
        const $submitButton = $('.quiz-submit-button');
        const $quizResults = $('.quiz-results');
        const $progressBar = $('<div class="quiz-progress-bar" style="margin-top:10px; margin-bottom:10px"><div class="quiz-progress-bar-inner"></div></div>');

        let currentQuestionIndex = 0;
        const userAnswers = [];

        if ($questions.length === 0) {
            console.error('No quiz questions found on the page.');
            return;
        }

        // Generate the correct answers dynamically
const correctAnswers = [];
$('.quiz-question').each(function() {
    let currentQuestionAnswers = [];
    $(this).find('input[data-is-correct="true"]').each(function() {
        currentQuestionAnswers.push($(this).val());
    });
    correctAnswers.push(currentQuestionAnswers);
});


        $questions.hide().eq(0).show();
        updateSubmitButtonState();
        updateProgressBar(); // Initialize the progress bar

        $('input[type="radio"], input[type="checkbox"]').on('change', function() {
            const $currentQuestion = $questions.eq(currentQuestionIndex);
            const $selectedAnswers = $currentQuestion.find('input:checked');
            const selectedAnswers = $selectedAnswers.map(function() {
                return $(this).val();
            }).get();

            userAnswers[currentQuestionIndex] = selectedAnswers;
            updateSubmitButtonState();
            updateProgressBar();
        });

        $submitButton.on('click', function() {
            const $currentQuestion = $questions.eq(currentQuestionIndex);
            $currentQuestion.hide();

            currentQuestionIndex++;

            if (currentQuestionIndex < $questions.length) {
                $questions.eq(currentQuestionIndex).show();
            } else {
                handleQuizSubmission();
            }

            updateSubmitButtonState();
            updateProgressBar();
        });

        function handleQuizSubmission() {
            $('#quiz_completed').val('true');
            $('.quiz-submit-button').hide();

            const totalQuestions = $questions.length;
            const correctCount = calculateCorrectAnswers(userAnswers, correctAnswers);

            $quizResults.show();
            $('.quiz-results-content').html('<b>You scored </b>' + correctCount + ' out of ' + totalQuestions + ' !');
        }

        function updateSubmitButtonState() {
            if (currentQuestionIndex < $questions.length && !userAnswers[currentQuestionIndex]) {
                $submitButton.prop('disabled', true);
            } else {
                $submitButton.prop('disabled', false);
            }
        }

        function calculateCorrectAnswers(userAnswers, correctAnswers) {
            let correctCount = 0;

            for (let i = 0; i < userAnswers.length; i++) {
                const userAnswer = userAnswers[i];
                if (arraysEqual(userAnswer, correctAnswers[i])) {
                    correctCount++;
                }
            }

            return correctCount;
        }

        function updateProgressBar() {
            const progressBarWidth = (100 / $questions.length) * (currentQuestionIndex);
            $progressBar.find('.quiz-progress-bar-inner').css('width', progressBarWidth + '%');
        }

        $('.interactive-quiz-widget').append($progressBar);

        function arraysEqual(arr1, arr2) {
            if (!arr1 || !arr2 || arr1.length !== arr2.length) return false;
            for (let i = 0; i < arr1.length; i++) {
                if (arr1[i] !== arr2[i]) return false;
            }
            return true;
        }
    });
})(jQuery);
