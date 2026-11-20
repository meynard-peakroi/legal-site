<footer role="contentinfo">
    <p><strong>&copy; <?= date("Y") ?> <?= $document->company_name ?>&trade;. All Rights Reserved.</strong></p>
    <p>
        If you have any questions or comments regarding this notice, please write to us with your specific instructions
        at:<br>
        <strong><?= $document->company_name ?> &trade;, 5442 S. 900 E, Ste. #156, Murray, UT 84117</strong>,<br>
        or email <a href="mailto:<?= $document->company_email ?>?Subject=Legal%20Inquiry"
                    aria-label="Email for Legal Inquiries"><?= $document->company_email ?></a>.
    </p>
    <nav aria-label="Footer navigation links">
        <a href="/terms" class="glightbox" aria-label="Read Terms and Conditions">Terms & Conditions <span class="pipes-mob">|</span></a>
        <a href="/privacy" class="glightbox" aria-label="Read Privacy Policy">Privacy Policy <span class="pipes-mob">|</span></a>
        <a href="/partners" class="glightbox" aria-label="View Marketing Partners">Marketing Partners <span class="pipes-mob">|</span></a>
        <a href="/ccpa" class="glightbox" aria-label="California Consumer Privacy Act Information">CCPA <span class="pipes-mob">|</span></a>
        <a href="/unsubscribe" class="glightbox" aria-label="Unsubscribe from Mailing List">Unsubscribe</a>
    </nav>
</footer>
<script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
<script>
    const lightbox = GLightbox();
</script>