<div class="sub-header">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <ul class="left-info">
                    <li><a href="mailto:info_laravel@gmail.com"><i class="fa fa-envelope"></i>info_laravel@gmail.com</a>
                    </li>
                    <li>
                        <a href="javascript:void(0)" onclick="copyToClipboard('0791234568')" title="Click to Copy">
                            <i class="fa fa-phone"></i> <span id="phone-num">0791234568</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <ul class="right-icons">
                    <li><a href="https://www.facebook.com/share/1AnrEiye4z/" target="_blank"
                            rel="noopener noreferrer"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="https://x.com/SandeepaDila" target="_blank" rel="noopener noreferrer"><i
                                class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.linkedin.com/in/sandeepa-dilakshana-666b29283" target="_blank"
                            rel="noopener noreferrer"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard(text) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Phone number copied to clipboard: ' + text);
        }, function(err) {
            console.error('Could not copy text: ', err);
        });
    }
</script>
