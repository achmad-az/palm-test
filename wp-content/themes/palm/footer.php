<?php do_action( 'palm_content_end' ); ?>

</main>

<?php do_action( 'palm_content_after' ); ?>

<footer class="bg-[#f0f0f0] px-8" aria-labelledby="footer-heading">
  <h2 id="footer-heading" class="sr-only">Footer</h2>
  <div class="mx-auto max-w-6xl pb-10 pt-16 sm:pt-24 lg:pt-20">
    <div class="xl:grid xl:grid-cols-3 xl:gap-4">
      <div class="space-y-3">
        <?php if (has_custom_logo()) : ?>
            <?php the_custom_logo(); ?>
        <?php else : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="-m-1.5 p-1.5">
                <img class="h-8 w-auto" src="<?php echo get_template_directory_uri(); ?>/assets/dist/images/logo.svg" alt="<?php bloginfo('name'); ?>">
            </a>
        <?php endif; ?>
        <div class="text-black text-lg font-bold font-['Verdana']">Alarmanlagenbau-Korsing <br/>GmbH & Co. KG</div>
        <div class="text-black text-lg font-normal font-['Verdana']">Walter-Korsing-Straße 21<br/>15230 Frankfurt (Oder)</div>
      </div>
      <div class="mt-16 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3 xl:col-span-2 xl:mt-0">
    <div>
        <h3 class="text-black text-lg font-bold font-['Verdana']">Unternehmen</h3>
        <ul role="list" class="mt-4 space-y-1">
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900">Unser Unternehmen</a>
            </li>
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900">Produkte & Hersteller</a>
            </li>
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900">Referenzen</a>
            </li>
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900">Kontakt</a>
            </li>
        </ul>
    </div>
    <div>
        <h3 class="text-black text-lg font-bold font-['Verdana']">Leistungen</h3>
        <ul role="list" class="mt-4 space-y-1">
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900">Einbruchmeldeanlagen</a>
            </li>
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900">Einbruchmeldeanlagen</a>
            </li>
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900">Einbruchmeldeanlagen</a>
            </li>
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900">lorem ipsum</a>
            </li>
        </ul>
    </div>
    <div>
        <h3 class="text-black text-lg font-bold font-['Verdana']">Den Kontakt Halten</h3>
        <ul role="list" class="mt-4 space-y-1">
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900">+49 335 545620</a>
            </li>
            <li>
                <a href="#" class="text-black text-base font-normal font-['Verdana'] hover:text-gray-900  text-nowrap">info@alarm­anlagen­bau-korsing.de</a>
            </li>
        </ul>
    </div>
</div>
    </div>
    <div class="w-full pt-8 justify-center items-center gap-3.5 inline-flex text-center">
        <div class="text-center text-black text-base font-normal font-['Verdana']">Impressum</div>
        <div class="text-center text-black text-base font-normal font-['Verdana']">•</div>
        <div class="text-center text-black text-base font-normal font-['Verdana']">Datenschutz</div>
    </div>
  </div>
</footer>

<?php do_action('palm_footer'); ?>
</div> <!-- #page -->
<?php wp_footer(); ?>
<?php do_action('palm_site_after'); ?>
</body>
</html>