<?php  
    $date = date("Y-m-d");
    $time = date("H:i:s");
    
    $isWRB = (isset($_GET['miejsceBazy']) && strtoupper($_GET['miejsceBazy']) == 'WRB');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <title>System obiadowy FIRMA XYZ</title>
    
    <link rel="stylesheet" href="css/dinner-system.css">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        appBg: '#f8fafc',
                        appText: '#1f2937',
                        appPrimary: '#401558',
                        appSecondary: '#2e123f',
                        appBorder: 'rgba(0, 0, 0, 0.1)',
                        appCard: 'rgba(255, 255, 255, 1)',
                        appMuted: '#6b7280',
                        appInputBg: 'rgba(243, 243, 243, 1)',
                    },
                    fontFamily: {
                        sans: ['FSMillbank', 'Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <style>
        <?php if($isWRB): ?>
        ::-webkit-scrollbar { display: none; }
        * { -ms-overflow-style: none; scrollbar-width: none; }
        <?php endif; ?>
    </style>
</head>

<body class="bg-appBg text-appText font-sans min-h-screen flex flex-col" data-wrb="<?php echo $isWRB ? '1' : '0'; ?>">

    <header class="sticky top-0 z-50 bg-appPrimary shadow-md border-b border-black/10">
        <div class="max-w-full mx-auto px-6 h-20 flex justify-between items-center text-white">
            <div class="flex items-center gap-3 select-none draggable-false">
                <h2 class="text-2xl">LOGO</h2>
                <h2 class="text-xl text-white text-shadow-sm tracking-wide">System obiadowy</h2>
                <a href="?miejsceBazy=<?php echo $isWRB ? 'KRA' : 'WRB'; ?>" 
                class="flex items-center bg-black/10 hover:bg-black/20 px-3 py-3 rounded-xl cursor-pointer transition-colors shadow-inner gap-2 text-white text-xs font-bold uppercase tracking-widest"
                title="Przełącz tryb wyświetlania">
                    
                    <?php if ($isWRB): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="20" height="14" x="2" y="3" rx="2"/>
                            <line x1="8" x2="16" y1="21" y2="21"/>
                            <line x1="12" x2="12" y1="17" y2="21"/>
                        </svg>
                    <?php else: ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="16" height="20" x="4" y="2" rx="2" ry="2"/>
                            <line x1="12" x2="12.01" y1="18" y2="18"/>
                        </svg>
                    <?php endif; ?>

                    <span><?php echo $isWRB ? 'TV MODE' : 'TOUCHSCREEN MODE'; ?></span>
                </a>
            </div>
            
            <div class="flex items-center gap-6">
                
                <?php if(!$isWRB): ?>
                    <span id="refreshMsg" class="bg-black/10 px-3 py-3 rounded-xl shadow-inner text-sm text-white tracking-widest uppercase font-bold opacity-0 transition-opacity duration-500">
                        Pobrano zamówienia
                    </span>
                    <div id="refreshBtn" class="flex items-center bg-black/10 hover:bg-black/20 px-3 py-3 rounded-xl cursor-pointer transition-colors shadow-inner" onclick="refreshOrders();" title="Odśwież zamówienia">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-white transition-transform duration-500">
                            <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/>
                            <path d="M21 3v5h-5"/>
                            <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/>
                            <path d="M3 21v-5h5"/>
                        </svg>
                    </div>
                <?php endif; ?>
                
                <div class="flex items-center gap-6 text-sm">
                    <span id="clock" class="font-bold text-xl text-base"></span>
                    <span class="text-xl"><?php echo $data['date']; ?></span>
                </div>
            </div>
        </div>
    </header>

    <div class="grow max-w-[1900px] w-full mx-auto px-6 py-10 flex flex-col lg:flex-row gap-8">
        
        <aside class="w-full lg:w-[320px] shrink-0 flex flex-col gap-6 lg:sticky lg:top-[6.5rem] self-start">
            
            <div class="container-card border border-appBorder rounded-2xl shadow-sm p-6 overflow-hidden">
                <h2 class="text-xs font-bold uppercase tracking-widest text-center text-appMuted mb-5">
                    Najbliższe wydarzenia
                </h2>
                
                <?php if(isset($data['news']) && is_array($data['news']) && count($data['news']) > 0): ?>
                    
                    <div class="relative w-full overflow-hidden" id="news-slider-viewport">
                        <div class="flex transition-transform duration-500 ease-out" id="news-slider-track">
                            <?php foreach($data['news'] as $index => $news): 
                                $dateEvent = isset($news['Date']) ? $news['Date']->format('Y-m-d') : '';
                                $timeEvent = isset($news['Time']) ? $news['Time'] : '';
                            ?>
                                <div class="w-full shrink-0 px-0.5">
                                    <div class="bg-appInputBg/80 border border-appBorder rounded-xl p-4 cursor-default min-h-[5.5rem] flex flex-col justify-center">
                                        <div class="flex items-center gap-3 text-sm font-bold text-appPrimary uppercase tracking-wider mb-2">
                                            <div class="flex items-center gap-1.5">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5"><rect width="18" height="18" x="3" y="4" rx="2" ry="2"/><line x1="16" x2="16" y1="2" y2="6"/><line x1="8" x2="8" y1="2" y2="6"/><line x1="3" x2="21" y1="10" y2="10"/></svg>
                                                <span><?php echo $dateEvent; ?></span>
                                            </div>
                                            
                                            <?php if(!empty($timeEvent) && $timeEvent !== '00:00'): ?>
                                            <div class="flex items-center gap-1 text-appMuted">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="w-3.5 h-3.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                                <span><?php echo $timeEvent; ?></span>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        
                                        <h3 class="text-md font-bold text-appText leading-snug line-clamp-3">
                                            <?php echo $news['Subject']; ?>
                                        </h3>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <?php if(count($data['news']) > 1): ?>
                    <div class="flex justify-center items-center gap-1.5 mt-4" id="news-slider-dots">
                        <?php foreach($data['news'] as $index => $news): ?>
                            <button 
                                onclick="goToNewsSlide(<?php echo $index; ?>)" 
                                class="news-dot h-1.5 rounded-full transition-all duration-300 <?php echo $index === 0 ? 'w-5 bg-appPrimary' : 'w-1.5 bg-black/10 hover:bg-black/20'; ?>"
                                title="Slajd <?php echo $index + 1; ?>"
                            ></button>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                <?php else: ?>
                    <div class="py-8 text-center">
                        <p class="text-sm text-appMuted font-medium">Brak nadchodzących wydarzeń.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="container-card border border-appBorder rounded-2xl shadow-sm p-6">
                <div class="flex items-center ml-[40px] gap-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-11 h-11 opacity-80"><path d="M12 20h.01"/><path d="M2 8.82a15 15 0 0 1 20 0"/><path d="M5 12.859a10 10 0 0 1 14 0"/><path d="M8.5 16.429a5 5 0 0 1 7 0"/></svg>
                    <div class="flex flex-col">
                        <span class="text-sm text-appMuted uppercase tracking-widest font-bold mb-1">WIFI FIRMA XYZ</span>
                        <strong class="text-xl text-appPrimary font-black tracking-widest">
                            P4SSwd26!
                        </strong>
                    </div>
                </div>
            </div>
            
            <div class="flex flex-col items-center mt-2">
                <p class="text-appMuted text-xs select-none uppercase tracking-widest opacity-60 text-center">
                    &copy; <?php echo date("Y"); ?> • System obiadowy FIRMA XYZ
                </p>
            </div>
            
        </aside>

        <main class="flex-1 min-w-0">
            <div class="relative container-card border border-appBorder rounded-2xl shadow-sm overflow-hidden max-h-[60vh] lg:max-h-[calc(100vh-10.125rem)] flex flex-col">
                
                <div id="orders-container" class="h-full w-full overflow-auto hide-native-scroll relative <?php echo !$isWRB ? 'scroll-smooth' : ''; ?>">
                    <table class="w-full text-left border-collapse whitespace-nowrap">
                        <thead>
                            <tr class="bg-appInputBg border-b border-appBorder sticky top-0 bg-appInputBg z-10">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-appMuted">Inicjały</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-appMuted">Zamówienia
                                    <?php if(isset($data['orders'])) { ?>
                                        <span class="ml-1 mt-1 text-sm font-medium text-appMuted px-2 py-1">
                                            <?php echo count($data['orders']); ?>
                                        </span>
                                    <?php } ?>
                                </th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-widest text-appMuted">Dostawca</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-appBorder">
                            <?php
                            if(isset($data['orders']) && count($data['orders']) > 0){
                                    foreach($data['orders'] as $order){

                                        if (strtoupper(trim($order['Initials'])) === 'POD') {
                                            $order['Initials'] = 'PAPO';
                                        }

                                        if (isset($_GET['test'])){
                                            echo '<tr><td colspan="3"><pre class="text-xs p-2">' . print_r($order, true) . '</pre></td></tr>';
                                        }

                                        $rowClass = 'even:bg-black/[0.03]';
                                        $order['Dish'] = trim($order['Dish']);
                                        $tempDish = substr($order['Dish'], 0 ,5);
                                        $numberToCut = filter_var($tempDish, FILTER_SANITIZE_NUMBER_INT);
                            ?>
                            <tr class="transition-colors <?php echo $rowClass; ?>" id="<?php echo $order['Initials']; ?>">
                                <td class="px-6 py-1.5 text-2xl">
                                    <?php if($isWRB): ?>
                                        <span class="text-appText font-bold">
                                            <?php echo $order['Initials']; ?>
                                        </span>
                                    <?php else: ?>
                                        <div class="relative group inline-block">
                                            <span class="cursor-pointer border-b border-dashed border-appMuted/50 text-appText font-bold">
                                                <?php echo $order['Initials']; ?>
                                            </span>
                                            <div class="invisible group-hover:visible opacity-0 group-hover:opacity-100 transition-all duration-200 absolute left-full ml-3 top-1/2 -translate-y-1/2 z-50">
                                                <div class="bg-white border border-appBorder px-4 py-2 rounded-xl shadow-xl whitespace-nowrap flex items-center gap-2">
                                                    <div class="w-2 h-2 rounded-full bg-appPrimary"></div>
                                                    <h4 class="text-appPrimary font-bold text-xl m-0">
                                                        <?php echo $order['Name']; ?>
                                                    </h4>
                                                </div>
                                                <div class="absolute right-full top-1/2 -translate-y-1/2 w-0 h-0 border-t-[6px] border-t-transparent border-b-[6px] border-b-transparent border-r-[8px] border-r-appBorder"></div>
                                                <div class="absolute right-full mr-[-1px] top-1/2 -translate-y-1/2 w-0 h-0 border-t-[5px] border-t-transparent border-b-[5px] border-b-transparent border-r-[7px] border-r-white"></div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </td>

                                <td class="px-6 py-1.5 text-md font-medium <?php echo $textClass; ?>">
                                    <?php
                                    if($order['AnotherProvider'] != 1) {
                                        $dish = str_replace('.', '', $order['Dish']);
                                        if(!empty($numberToCut)) {
                                            $dish = str_replace($numberToCut, '', $dish);
                                        }
                                        echo trim($dish);
                                    } else {
                                        echo '<span class="text-appMuted italic border-l-2 border-appPrimary/30 pl-2">Zewnętrzny dostawca</span>';
                                    }
                                    ?>
                                </td>
                                <td class="px-6 py-1.5 text-sm font-bold text-appMuted">
                                    <?php echo $order['providerName']; ?>
                                </td>                                                      
                            </tr>
                            <?php
                                    }
                            } else {
                            ?>
                            <tr>
                                <td colspan="3" class="px-6 py-16 text-center text-appMuted font-medium bg-appInputBg/50">
                                    Brak potwierdzonych zamówień
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <div class="absolute right-1 top-2 bottom-2 w-1.5 pointer-events-none z-50">
                    <div id="custom-thumb" class="w-full bg-black/20 hover:bg-black/30 rounded-full absolute top-0 transition-all duration-200 ease-out opacity-0"></div>
                </div>

            </div>
        </main>
    </div>

    <script src="script.js"></script> 
</body>
</html>