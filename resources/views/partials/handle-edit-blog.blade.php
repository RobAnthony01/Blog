<script>

    // Used to insert HTML tags in blog_text.
    // Either wraps selected text in tags, or
    // Places tags at the caret and moves caret to allow typing between the tags

    function insert(startString, endString) {
        const textBox = document.getElementById('blog_text');
        textBox.focus();
        let caretStart = textBox.selectionStart;
        let caretEnd = textBox.selectionEnd;
        let textInListBox = textBox.value;
        let newText = textInListBox.substring(0, caretStart) + startString + textInListBox.substring(caretStart, caretEnd) + endString + textInListBox.substring(caretEnd, textInListBox.length);
        textBox.value = newText;
        textBox.selectionEnd = caretEnd + startString.length + endString.length;
        document.getElementById('preview').innerHTML = newText;
        // document.getElementById('preview').css('FontSize', '0.5em');
    }

    //previews HTML text written in blog_text by copying it to preview

    function drawHTML() {
        document.getElementById('preview').innerHTML = document.getElementById('blog_text').value;
    }

    // Moves Options in a ListBox
    // from the ListBox with id in leftListBoxID
    // to ListBox with id in rightListBoxID
    // Will move only selected items if isMoveAll === false
    // Will move all items if isMoveAll === true

    function MoveListBoxItem(leftListBoxID, rightListBoxID, isMoveAll) {
        const fromParent = document.getElementById(leftListBoxID);
        const toParent = document.getElementById(rightListBoxID);
        let count = fromParent.options.length;
        let movingOptions = [];
        for (let i = 0; i < count; i++) {
            if (fromParent.options[i].selected === true || isMoveAll) {
                movingOptions.push(fromParent.options[i]);
            }
        }
        count = movingOptions.length;
        for (let i = 0; i < count; i++) {
            {
                opt = movingOptions.pop();
                opt.selected = false;
                toParent.appendChild(opt);
            }
        }
    }

    window.addEventListener('DOMContentLoaded', function () {
            drawHTML();
            document.getElementById('blog_text').addEventListener('input', function () {
                drawHTML();
            });

            // SUBMIT button - converts HTML text so it goes through filters
            // Stores selected category ids as string list in hidden input categoryIds

            document.getElementById('submitbtn').addEventListener('click', function () {
                const textBox = document.getElementById('blog_text');
                textBox.value = textBox.value.replace(/<(.+?)>/g, '< $1 >');
                let hiddenString = '';
                const selected = document.querySelectorAll('#SelectedCategories option');
                for (let select of selected) {
                    hiddenString += select.value + ",";
                }
                document.getElementById('categoryIds').value = hiddenString;
            });

            //Handles date picker

            $(function () {
                let pd = $('#publish_date');
                let currentDate = new Date();
                pd.datepicker({
                    dateFormat: "dd-mm-yy"
                });
                if (empty(pd.val())) {
                    pd.datepicker("setDate", currentDate);
                }
            });

            // Category button handlers

            document.getElementById('addAll').addEventListener('click', function () {
                MoveListBoxItem('categoryItems', 'SelectedCategories', true);
            });
            document.getElementById('addSelected').addEventListener('click', function () {
                MoveListBoxItem('categoryItems', 'SelectedCategories', false);
            });
            document.getElementById('removeAll').addEventListener('click', function () {
                MoveListBoxItem('SelectedCategories', 'categoryItems', true);
            });
            document.getElementById('removeSelected').addEventListener('click', function () {
                MoveListBoxItem('SelectedCategories', 'categoryItems', false);
            });

            // HTML tag button handlers
            document.getElementById('left').addEventListener('click', function () {
                insert("<p class=\"text-left\">", "</p>");
            });
            document.getElementById('right').addEventListener('click', function () {
                insert("<p class=\"text-right\">", "</p>");
            });
            document.getElementById('center').addEventListener('click', function () {
                insert("<p class=\"text-center\">", "</p>");
            });
            document.getElementById('justify').addEventListener('click', function () {
                insert("<p class=\"text-justify\">", "</p>");
            });

            document.getElementById('bold').addEventListener('click', function () {
                insert("<b>", "</b>");
            });
            document.getElementById('italic').addEventListener('click', function () {
                insert("<i>", "</i>");
            });
            document.getElementById('underline').addEventListener('click', function () {
                insert("<u>", "</u>");
            });
            document.getElementById('subscript').addEventListener('click', function () {
                insert("<sub>", "</sub>");
            });
            document.getElementById('superscript').addEventListener('click', function () {
                insert("<sup>", "</sup>");
            });
            document.getElementById('p').addEventListener('click', function () {
                insert("<p>", "</p>");
            });
            document.getElementById('h3').addEventListener('click', function () {
                insert("<h3>", "</h3>");
            });
            document.getElementById('h4').addEventListener('click', function () {
                insert("<h4>", "</h4>");
            });
            document.getElementById('h5').addEventListener('click', function () {
                insert("<h5>", "</h5>");
            });
            document.getElementById('ol').addEventListener('click', function () {
                insert("<ol>", "</ol>");
            });
            document.getElementById('ul').addEventListener('click', function () {
                insert("<ul>", "</ul>");
            });
            document.getElementById('li').addEventListener('click', function () {
                insert("<li>", "</li>");
            });
            document.getElementById('img').addEventListener('click', function () {
                insert('<img class="" src="">', '');
            });
            document.getElementById('a-link').addEventListener('click', function () {
                insert('<a href="">', '</a>');
            });
            document.getElementById('pre').addEventListener('click', function () {
                insert("<pre>", "</pre>");
            });
            document.getElementById('code').addEventListener('click', function () {
                insert("<code>", "</code>");
            });

        },
        false
    );
</script>