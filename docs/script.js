const isWRB = document.body.dataset.wrb === '1';

$(document).ready(function() {
    setInterval(updateClock, 1000);
    updateClock();
    initNewsSlider();
    
    if (isWRB) {
        startAutoScroll();
    }
});

function startAutoScroll() {
    var $container = $('#orders-container');
    
    function scrollDown() {
        var maxScroll = $container[0].scrollHeight - $container[0].clientHeight;
        if (maxScroll > 0) {
            $container.animate({ scrollTop: maxScroll }, maxScroll * 20, 'linear', function() {
                setTimeout(scrollTop, 4000);
            });
        } else {
            setTimeout(scrollDown, 10000);
        }
    }
  
    function scrollTop() {
        $container.animate({ scrollTop: 0 }, 1500, 'swing', function() {
            setTimeout(scrollDown, 5000);
        });
    }
    
    // Start po 5 sekundach
    setTimeout(scrollDown, 5000);
}

function updateClock() {
    var currentTime = new Date();
    var currentHours = currentTime.getHours();
    var currentMinutes = currentTime.getMinutes();
    var currentSeconds = currentTime.getSeconds();

    currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
    currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

    var currentTimeString = currentHours + ":" + currentMinutes + ":" + currentSeconds;
    $("#clock").text(currentTimeString);
}

const container = document.getElementById('orders-container');
const thumb = document.getElementById('custom-thumb');
let hideScrollTimeout;

function updateCustomScrollbar() {
    if (!container || !thumb) return;

    const { scrollTop, scrollHeight, clientHeight } = container;
    
    if (scrollHeight <= clientHeight) {
        thumb.style.opacity = '0';
        return;
    }
    
    const thumbHeight = Math.max((clientHeight / scrollHeight) * clientHeight, 30);
    thumb.style.height = `${thumbHeight}px`;
    
    const maxScrollTop = scrollHeight - clientHeight;
    const maxThumbTop = clientHeight - thumbHeight - 16;
    const thumbTop = maxScrollTop > 0 ? (scrollTop / maxScrollTop) * maxThumbTop : 0;
    thumb.style.top = `${thumbTop + 8}px`;
    thumb.style.opacity = '1';
    
    // Na dotykowym ekranie w Krakowie suwak ukryje się po 1.5s spoczynku
    if (!isWRB) {
        clearTimeout(hideScrollTimeout);
        hideScrollTimeout = setTimeout(() => {
            thumb.style.opacity = '0';
        }, 1500);
    }
}

if (container) {
    container.addEventListener('scroll', updateCustomScrollbar);
    window.addEventListener('resize', updateCustomScrollbar);
    setTimeout(updateCustomScrollbar, 500);
}

document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
});

let msgTimeout;

function refreshOrders() {
    const $btnIcon = $('#refreshBtn svg'); 
    const $container = $('#orders-container');
    const $msg = $('#refreshMsg');

    $btnIcon.addClass('rotate-180');

    $container.load(location.href + " #orders-container > *", function(response, status) {
        setTimeout(() => {
            $btnIcon.removeClass('rotate-180');
        }, 500);

        if (status === "success") {
            updateCustomScrollbar();
            
            $msg.removeClass('opacity-0').addClass('opacity-100');
            
            clearTimeout(msgTimeout);
            msgTimeout = setTimeout(() => {
                $msg.removeClass('opacity-100').addClass('opacity-0');
            }, 2500);
        }
    });
}

let currentNewsIndex = 0;
let newsSliderTimer;
const newsSlideDuration = 5000;

function initNewsSlider() {
    const $track = $('#news-slider-track');
    const totalSlides = $track.children().length;
    
    if (totalSlides <= 1) return;

    function startAutoSlide() {
        clearInterval(newsSliderTimer);
        newsSliderTimer = setInterval(() => {
            currentNewsIndex = (currentNewsIndex + 1) % totalSlides;
            updateNewsSlider();
        }, newsSlideDuration);
    }

    startAutoSlide();
}

function updateNewsSlider() {
    const $track = $('#news-slider-track');
    const $dots = $('.news-dot');

    $track.css('transform', `translateX(-${currentNewsIndex * 100}%)`);

    $dots.each(function(index) {
        if (index === currentNewsIndex) {
            $(this).removeClass('w-1.5 bg-black/10 hover:bg-black/20').addClass('w-5 bg-appPrimary');
        } else {
            $(this).removeClass('w-5 bg-appPrimary').addClass('w-1.5 bg-black/10 hover:bg-black/20');
        }
    });
}

function goToNewsSlide(index) {
    const totalSlides = $('#news-slider-track').children().length;
    if (index < 0 || index >= totalSlides) return;

    currentNewsIndex = index;
    updateNewsSlider();

    clearInterval(newsSliderTimer);
    newsSliderTimer = setInterval(() => {
        currentNewsIndex = (currentNewsIndex + 1) % totalSlides;
        updateNewsSlider();
    }, newsSlideDuration);
}