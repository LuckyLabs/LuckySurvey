!function($){
    var questionTpl = doT.template( $("#questionTemplate").html()),
        answerTpl = doT.template( $("#answersTemplate").html()),

        questionIterator = $(".question").length;

    $("#addQuestion").click(function(e){
        e.preventDefault();

        $("#questionsList").append(questionTpl({id: questionIterator}));
        questionIterator++;
    });

    $(document).on('click', ".addAnswer", function(e){
        e.preventDefault();

        var question = $(this).closest('.question'),
            questionId = question.data('id'),
            answerIterator = question.find('.answer').length,
            html = answerTpl({
                question: questionId,
                id: answerIterator
            });

        question.find('.answersList').append(html);
    });
}(jQuery);