<!doctype html>
<html lang="de">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.tailwindcss.com" rel="stylesheet">
    <style>
    .bg-white {
    --tw-bg-opacity: 1;
    background-color: rgb(255 255 255 / var(--tw-bg-opacity))
    }
    .flex {
    display: flex;
    }
    .px-2 {
    padding-left: .5rem;
    padding-right: .5rem
    }
    .p-2 {
    padding: .5rem
    }
    .h-auto { height: auto }
    .w-auto{ width:auto;}
    .w-fit{width: fit-content;}
    .min-w-fit{min-width: fit-content;}
    .w-0	{width: 0px;}
    .w-px	{width: 1px;}
    .w-0_5	{width: 0.125rem; /* 2px */}
    .w-1	{width: 0.25rem; /* 4px */}
    .w-1_5	{width: 0.375rem; /* 6px */}
    .w-2	{width: 0.5rem; /* 8px */}
    .w-2_5	{width: 0.625rem; /* 10px */}
    .w-3	{width: 0.75rem; /* 12px */}
    .w-3_5	{width: 0.875rem; /* 14px */}
    .w-4	{width: 1rem; /* 16px */}
    .w-5	{width: 1.25rem; /* 20px */}
    .w-6	{width: 1.5rem; /* 24px */}
    .w-7	{width: 1.75rem; /* 28px */}
    .w-8	{width: 2rem; /* 32px */}
    .w-9	{width: 2.25rem; /* 36px */}
    .w-10	{width: 2.5rem; /* 40px */}
    .w-11	{width: 2.75rem; /* 44px */}
    .w-12	{width: 3rem; /* 48px */}
    .w-14	{width: 3.5rem; /* 56px */}
    .w-16	{width: 4rem; /* 64px */}
    .w-20	{width: 5rem; /* 80px */}
    .w-24	{width: 6rem; /* 96px */}
    .w-28	{width: 7rem; /* 112px */}
    .w-32	{width: 8rem; /* 128px */}
    .w-36	{width: 9rem; /* 144px */}
    .w-40	{width: 10rem; /* 160px */}
    .w-44	{width: 11rem; /* 176px */}
    .w-48	{width: 12rem; /* 192px */}
    .w-52	{width: 13rem; /* 208px */}
    .w-56	{width: 14rem; /* 224px */}
    .w-60	{width: 15rem; /* 240px */}
    .w-64	{width: 16rem; /* 256px */}
    .w-72	{width: 18rem; /* 288px */}
    .w-80	{width: 20rem; /* 320px */}
    .w-96	{width: 24rem; /* 384px */}
    .space-y-2{    
    margin-top: 2px;
    margin-bottom: 2px;
    }
    .w-3-12 {
    width: 25%;
    }
    .w-full {
    width: 100%;
    }
    .w-8-12 {
    width: 66.666667%;
    }
    .bg-blue-200 {
    --bg-opacity: 1;
    background-color: #bee3f8;
    background-color: rgba(190,227,248);
    }
    
    .mx-2 {
        margin-left: 0.5rem;
        margin-right: 0.5rem;
    }
    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }
    .p-3 {
        padding: 0.75rem;
    }
    .border-t-4 {
        border-top-width: 4px;
    }
    .border-blue-200 {
        --bg-opacity: 1;
        border-color: #bee3f8;
        border-color: rgba(190,227,248);
    }
    .overflow-hidden {
        overflow: hidden;
    }
    img {
        border-style: none;
        max-width: 80%;
        height: auto;
        display: block;
    }
    .space-x-2{
        margin-left: 0.5rem; /* 8px */
    }
    .space-x-3{
        margin-left: 0.75rem; /* 12px */
    }
    .font-semibold {
        font-weight: 600;
    }
    .leading-normal {
        line-height: 1.5;
    }
    .leading-tight {
        line-height: 1.25;
    }
    .text-left {
        text-align: left
    }

    .text-center {
        text-align: center
    }

    .text-right {
        text-align: right
    }

    .text-justify {
        text-align: justify
    }
    .text-black {
        --text-opacity: 1;
        color: #000;
        color: rgba(0,0,0)
    }

    .text-white {
        --text-opacity: 1;
        color: #fff;
        color: rgba(255,255,255)
    }

    .text-gray-100 {
        --text-opacity: 1;
        color: #f7fafc;
        color: rgba(247,250,252)
    }

    .text-gray-200 {
        --text-opacity: 1;
        color: #edf2f7;
        color: rgba(237,242,247)
    }

    .text-gray-300 {
        --text-opacity: 1;
        color: #e2e8f0;
        color: rgba(226,232,240)
    }

    .text-gray-400 {
        --text-opacity: 1;
        color: #cbd5e0;
        color: rgba(203,213,224)
    }

    .text-gray-500 {
        --text-opacity: 1;
        color: #a0aec0;
        color: rgba(160,174,192)
    }

    .text-gray-600 {
        --text-opacity: 1;
        color: #718096;
        color: rgba(113,128,150)
    }

    .text-gray-700 {
        --text-opacity: 1;
        color: #4a5568;
        color: rgba(74,85,104)
    }

    .text-gray-800 {
        --text-opacity: 1;
        color: #2d3748;
        color: rgba(45,55,72)
    }

    .text-gray-900 {
        --text-opacity: 1;
        color: #1a202c;
        color: rgba(26,32,44)
    }

    .text-red-100 {
        --text-opacity: 1;
        color: #fff5f5;
        color: rgba(255,245,245)
    }

    .text-red-200 {
        --text-opacity: 1;
        color: #fed7d7;
        color: rgba(254,215,215)
    }

    .text-red-300 {
        --text-opacity: 1;
        color: #feb2b2;
        color: rgba(254,178,178)
    }

    .text-red-400 {
        --text-opacity: 1;
        color: #fc8181;
        color: rgba(252,129,129)
    }

    .text-red-500 {
        --text-opacity: 1;
        color: #f56565;
        color: rgba(245,101,101)
    }

    .text-red-600 {
        --text-opacity: 1;
        color: #e53e3e;
        color: rgba(229,62,62)
    }

    .text-red-700 {
        --text-opacity: 1;
        color: #c53030;
        color: rgba(197,48,48)
    }

    .text-red-800 {
        --text-opacity: 1;
        color: #9b2c2c;
        color: rgba(155,44,44)
    }

    .text-red-900 {
        --text-opacity: 1;
        color: #742a2a;
        color: rgba(116,42,42)
    }

    .text-orange-100 {
        --text-opacity: 1;
        color: #fffaf0;
        color: rgba(255,250,240)
    }

    .text-orange-200 {
        --text-opacity: 1;
        color: #feebc8;
        color: rgba(254,235,200)
    }

    .text-orange-300 {
        --text-opacity: 1;
        color: #fbd38d;
        color: rgba(251,211,141)
    }

    .text-orange-400 {
        --text-opacity: 1;
        color: #f6ad55;
        color: rgba(246,173,85)
    }

    .text-orange-500 {
        --text-opacity: 1;
        color: #ed8936;
        color: rgba(237,137,54)
    }

    .text-orange-600 {
        --text-opacity: 1;
        color: #dd6b20;
        color: rgba(221,107,32)
    }

    .text-orange-700 {
        --text-opacity: 1;
        color: #c05621;
        color: rgba(192,86,33)
    }

    .text-orange-800 {
        --text-opacity: 1;
        color: #9c4221;
        color: rgba(156,66,33)
    }

    .text-orange-900 {
        --text-opacity: 1;
        color: #7b341e;
        color: rgba(123,52,30)
    }

    .text-yellow-100 {
        --text-opacity: 1;
        color: ivory;
        color: rgba(255,255,240)
    }

    .text-yellow-200 {
        --text-opacity: 1;
        color: #fefcbf;
        color: rgba(254,252,191)
    }

    .text-yellow-300 {
        --text-opacity: 1;
        color: #faf089;
        color: rgba(250,240,137)
    }

    .text-yellow-400 {
        --text-opacity: 1;
        color: #f6e05e;
        color: rgba(246,224,94)
    }

    .text-yellow-500 {
        --text-opacity: 1;
        color: #ecc94b;
        color: rgba(236,201,75)
    }

    .text-yellow-600 {
        --text-opacity: 1;
        color: #d69e2e;
        color: rgba(214,158,46)
    }

    .text-yellow-700 {
        --text-opacity: 1;
        color: #b7791f;
        color: rgba(183,121,31)
    }

    .text-yellow-800 {
        --text-opacity: 1;
        color: #975a16;
        color: rgba(151,90,22)
    }

    .text-yellow-900 {
        --text-opacity: 1;
        color: #744210;
        color: rgba(116,66,16)
    }

    .text-green-100 {
        --text-opacity: 1;
        color: #f0fff4;
        color: rgba(240,255,244)
    }

    .text-green-200 {
        --text-opacity: 1;
        color: #c6f6d5;
        color: rgba(198,246,213)
    }

    .text-green-300 {
        --text-opacity: 1;
        color: #9ae6b4;
        color: rgba(154,230,180)
    }

    .text-green-400 {
        --text-opacity: 1;
        color: #68d391;
        color: rgba(104,211,145)
    }

    .text-green-500 {
        --text-opacity: 1;
        color: #48bb78;
        color: rgba(72,187,120)
    }

    .text-green-600 {
        --text-opacity: 1;
        color: #38a169;
        color: rgba(56,161,105)
    }

    .text-green-700 {
        --text-opacity: 1;
        color: #2f855a;
        color: rgba(47,133,90)
    }

    .text-green-800 {
        --text-opacity: 1;
        color: #276749;
        color: rgba(39,103,73)
    }

    .text-green-900 {
        --text-opacity: 1;
        color: #22543d;
        color: rgba(34,84,61)
    }

    .text-teal-100 {
        --text-opacity: 1;
        color: #e6fffa;
        color: rgba(230,255,250)
    }

    .text-teal-200 {
        --text-opacity: 1;
        color: #b2f5ea;
        color: rgba(178,245,234)
    }

    .text-teal-300 {
        --text-opacity: 1;
        color: #81e6d9;
        color: rgba(129,230,217)
    }

    .text-teal-400 {
        --text-opacity: 1;
        color: #4fd1c5;
        color: rgba(79,209,197)
    }

    .text-teal-500 {
        --text-opacity: 1;
        color: #38b2ac;
        color: rgba(56,178,172)
    }

    .text-teal-600 {
        --text-opacity: 1;
        color: #319795;
        color: rgba(49,151,149)
    }

    .text-teal-700 {
        --text-opacity: 1;
        color: #2c7a7b;
        color: rgba(44,122,123)
    }

    .text-teal-800 {
        --text-opacity: 1;
        color: #285e61;
        color: rgba(40,94,97)
    }

    .text-teal-900 {
        --text-opacity: 1;
        color: #234e52;
        color: rgba(35,78,82)
    }

    .text-blue-100 {
        --text-opacity: 1;
        color: #ebf8ff;
        color: rgba(235,248,255)
    }

    .text-blue-200 {
        --text-opacity: 1;
        color: #bee3f8;
        color: rgba(190,227,248)
    }

    .text-blue-300 {
        --text-opacity: 1;
        color: #90cdf4;
        color: rgba(144,205,244)
    }

    .text-blue-400 {
        --text-opacity: 1;
        color: #63b3ed;
        color: rgba(99,179,237)
    }

    .text-blue-500 {
        --text-opacity: 1;
        color: #4299e1;
        color: rgba(66,153,225)
    }

    .text-blue-600 {
        --text-opacity: 1;
        color: #3182ce;
        color: rgba(49,130,206)
    }

    .text-blue-700 {
        --text-opacity: 1;
        color: #2b6cb0;
        color: rgba(43,108,176)
    }

    .text-blue-800 {
        --text-opacity: 1;
        color: #2c5282;
        color: rgba(44,82,130)
    }

    .text-blue-900 {
        --text-opacity: 1;
        color: #2a4365;
        color: rgba(42,67,101)
    }

    .text-indigo-100 {
        --text-opacity: 1;
        color: #ebf4ff;
        color: rgba(235,244,255)
    }

    .text-indigo-200 {
        --text-opacity: 1;
        color: #c3dafe;
        color: rgba(195,218,254)
    }

    .text-indigo-300 {
        --text-opacity: 1;
        color: #a3bffa;
        color: rgba(163,191,250)
    }

    .text-indigo-400 {
        --text-opacity: 1;
        color: #7f9cf5;
        color: rgba(127,156,245)
    }

    .text-indigo-500 {
        --text-opacity: 1;
        color: #667eea;
        color: rgba(102,126,234)
    }

    .text-indigo-600 {
        --text-opacity: 1;
        color: #5a67d8;
        color: rgba(90,103,216)
    }

    .text-indigo-700 {
        --text-opacity: 1;
        color: #4c51bf;
        color: rgba(76,81,191)
    }

    .text-indigo-800 {
        --text-opacity: 1;
        color: #434190;
        color: rgba(67,65,144)
    }

    .text-indigo-900 {
        --text-opacity: 1;
        color: #3c366b;
        color: rgba(60,54,107)
    }

    .text-purple-100 {
        --text-opacity: 1;
        color: #faf5ff;
        color: rgba(250,245,255)
    }

    .text-purple-200 {
        --text-opacity: 1;
        color: #e9d8fd;
        color: rgba(233,216,253)
    }

    .text-purple-300 {
        --text-opacity: 1;
        color: #d6bcfa;
        color: rgba(214,188,250)
    }

    .text-purple-400 {
        --text-opacity: 1;
        color: #b794f4;
        color: rgba(183,148,244)
    }

    .text-purple-500 {
        --text-opacity: 1;
        color: #9f7aea;
        color: rgba(159,122,234)
    }

    .text-purple-600 {
        --text-opacity: 1;
        color: #805ad5;
        color: rgba(128,90,213)
    }

    .text-purple-700 {
        --text-opacity: 1;
        color: #6b46c1;
        color: rgba(107,70,193)
    }

    .text-purple-800 {
        --text-opacity: 1;
        color: #553c9a;
        color: rgba(85,60,154)
    }

    .text-purple-900 {
        --text-opacity: 1;
        color: #44337a;
        color: rgba(68,51,122)
    }

    .text-pink-100 {
        --text-opacity: 1;
        color: #fff5f7;
        color: rgba(255,245,247)
    }

    .text-pink-200 {
        --text-opacity: 1;
        color: #fed7e2;
        color: rgba(254,215,226)
    }

    .text-pink-300 {
        --text-opacity: 1;
        color: #fbb6ce;
        color: rgba(251,182,206)
    }

    .text-pink-400 {
        --text-opacity: 1;
        color: #f687b3;
        color: rgba(246,135,179)
    }

    .text-pink-500 {
        --text-opacity: 1;
        color: #ed64a6;
        color: rgba(237,100,166)
    }

    .text-pink-600 {
        --text-opacity: 1;
        color: #d53f8c;
        color: rgba(213,63,140)
    }

    .text-pink-700 {
        --text-opacity: 1;
        color: #b83280;
        color: rgba(184,50,128)
    }

    .text-pink-800 {
        --text-opacity: 1;
        color: #97266d;
        color: rgba(151,38,109)
    }

    .text-pink-900 {
        --text-opacity: 1;
        color: #702459;
        color: rgba(112,36,89)
    }
    .text-xl{
        font-size: 1.25rem; /* 20px */
    line-height: 1.75rem; /* 28px */
    }
    .text-lg{
        font-size: 1.125rem; /* 18px */
        line-height: 1.75rem; /* 28px */
    }
    .text-xs{
        font-size: 0.75rem; /* 12px */
        line-height: 1rem; /* 16px */
    }
    .text-sm{
        font-size: 0.875rem; /* 14px */
        line-height: 1.25rem; /* 20px */
    }
    .text-base{
        font-size: 1rem; /* 16px */
        line-height: 1.5rem; /* 24px */
    }
    .text-2xl{	font-size: 1.5rem; /* 24px */
    line-height: 2rem; /* 32px */}
    .text-3xl{	font-size: 1.875rem; /* 30px */
    line-height: 2.25rem; /* 36px */}
    .text-4xl	{font-size: 2.25rem; /* 36px */
    line-height: 2.5rem; /* 40px */}
    .text-5xl	{font-size: 3rem; /* 48px */
    line-height: 1;}
    .text-6xl	{font-size: 3.75rem; /* 60px */
    line-height: 1;}
    .text-7xl	{font-size: 4.5rem; /* 72px */
    line-height: 1;}
    .text-8xl	{font-size: 6rem; /* 96px */
    line-height: 1;}
    .text-9xl	{font-size: 8rem; /* 128px */
    line-height: 1;}

    .mb-3 {
        margin-bottom: 0.75rem;
    }
    .shadow-sm {
        box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
    }
    .rounded-sm {
        border-radius: 0.125rem;
    }
    .my-4 {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }
    </style>
        
        
</head>
<body>





<!--the grid -->
    <div class="space-y-2 flex mx-auto">
    

        
            <!-- Left Side -->
            <div class="w-fit w-64 h-auto bg-blue-200">
                <!-- Profile Card -->
                <div class="p-3 border-t-4 border-blue-200">
                    <div class="image overflow-hidden w-64">
                    <img src="{{ asset('storage/'.$profile->profileimg) }}" >
                    </div>
                    <div class="flex space-x-3 font-semibold text-gray-900 text-xl leading-normal">
                        <span>Persönliches</span>
                    </div>
                    
                    <div class="flex space-x-2 font-semibold text-gray-900 leading-tight mb-3">
                                <span class="text-blue-800">
                                <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
                                </svg>
                                </span>
                                <span ><h3 class="text-gray-600 font-lg text-semibold leading-tight"> {{$profile->email}}</h3></span>
                    </div>

                    <div class="flex space-x-2 font-semibold text-gray-900 leading-tight mb-3">
                                <span class="text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                </svg>
                                </span>
                                <span ><h3 class="text-gray-600 font-lg text-semibold leading-tight"> {{$profile->handynummer}}</h3></span>
                    </div>
                    <div class="flex space-x-2 font-semibold text-gray-900 leading-tight mb-3">
                                <span class="text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                                </svg>
                                </span>
                                <span ><h3 class="text-gray-600 font-lg text-semibold leading-tight"> {{$profile->straße}}, {{$profile->plz}} {{$profile->ort}}</h3></span>
                    </div>   

                    <div class="flex space-x-2 font-semibold text-gray-900 leading-tight mb-3">
                                <span class="text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8.25v-1.5m0 1.5c-1.355 0-2.697.056-4.024.166C6.845 8.51 6 9.473 6 10.608v2.513m6-4.87c1.355 0 2.697.055 4.024.165C17.155 8.51 18 9.473 18 10.608v2.513m-3-4.87v-1.5m-6 1.5v-1.5m12 9.75l-1.5.75a3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0 3.354 3.354 0 00-3 0 3.354 3.354 0 01-3 0L3 16.5m15-3.38a48.474 48.474 0 00-6-.37c-2.032 0-4.034.125-6 .37m12 0c.39.049.777.102 1.163.16 1.07.16 1.837 1.094 1.837 2.175v5.17c0 .62-.504 1.124-1.125 1.124H4.125A1.125 1.125 0 013 20.625v-5.17c0-1.08.768-2.014 1.837-2.174A47.78 47.78 0 016 13.12M12.265 3.11a.375.375 0 11-.53 0L12 2.845l.265.265zm-3 0a.375.375 0 11-.53 0L9 2.845l.265.265zm6 0a.375.375 0 11-.53 0L15 2.845l.265.265z" />
                                </svg>
                                </span>
                                <span ><h3 class="text-gray-600 font-lg text-semibold leading-tight"> {{$profile->geburtstag}}</h3></span>
                    </div>   

                                       
                </div>
                <!-- End of profile card -->
                
                <!-- Skills card -->
                <div class="p-3">
                    <div class="flex space-x-3 font-semibold text-gray-900 text-xl leading-normal">
                        <span>Fähigkeiten</span>
                    </div>

                    <div class="flex space-x-2 font-semibold text-gray-900 leading-tight mb-3">
                            <span clas="text-green-500"> </span>
                            <span ><h3 class="text-gray-600 font-lg text-semibold leading-tight"> 
                            <ul>

                            @foreach($profile->tags as $e)

                            <li> {{$e}} </li>

                            @endforeach
                            </ul>
                            </h3>
                            </span>
                    </div>              
                </div>

                <!-- End of Skills card -->
                 <!-- Languages card -->
                 <div class="p-3">
                    <div class="flex space-x-3 font-semibold text-gray-900 text-xl leading-normal">
                        <span>Sprachen</span>
                    </div>

                    <div class="flex space-x-2 font-semibold text-gray-900 leading-tight mb-3">
                            <span clas="text-green-500"> </span>
                            <span ><h3 class="text-gray-600 font-lg text-semibold leading-tight"> 
                            <ul>
                            @foreach($profile->languages as $lan)
                        
                            <li>
                            {{$lan->language}}  {{$lan->level}}                   
                            </li>
                            @endforeach                            
                            </ul>
                            </h3>
                            </span>
                    </div>                                  
                </div>
                <!-- End of Languages card -->
            </div>

            <!-- Right Side -->
            <div class="w-fit w-80 mx-2 h-auto">
            <!-- Profile tab -->
                <!-- About Section -->
                <div class="bg-white p-3 shadow-sm rounded-sm">             
                    <div class="text-4xl text-blue-700 font-semibold leading-tight">{{$profile->vorname}}</div>
                    <div class="text-4xl text-blue-700 font-semibold leading-tight">{{$profile->name}}</div>
                    <div class="text-3xl text-blue-400 font-semibold leading-tight">{{$profile->wunschposition}}</div>      
                </div>
                <!-- End of about section -->

                <div class="my-4"></div>

                <!-- Beruferfahrungen .- kann leer Sein -->
                @if (count($profile->experiences) > 0)
                <div class="bg-white p-3 shadow-sm rounded-sm">                  
                        
                        
                            <div class="flex space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="tracking-wide">Beruferfahrungen</span>
                            </div>

                            <ul class="list-inside space-y-2">
                            @foreach ($profile->experiences as $exp)
                                <li>
                                    <div class="text-blue-600">{{$exp->jname}} </div>
                                    <div class="text-gray-600">{{$exp->cnname}} </div>
                                    <div class="text-gray-500 text-s"> {{$exp->started_at->format('d/m/Y')}} - {{ $exp->finished_at?->format('d/m/Y') }}                                        
                                    </div>
                                    <div class="text-gray-500 text-s max-w-xl">{{$exp->description}}</div>
                                </li>
                                @endforeach                           
                            </ul>
                        
                 <!-- End of Beruferfahrungen grid --> 
                </div>
                @else

                @endif
                <div class="my-4"></div>

                <!-- Bildungsweg  -->                      
                <div class="bg-white p-3 shadow-sm rounded-sm">              
                        <div>
                            <div class="flex space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                <span clas="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5" />
                                </svg>
                                </span>
                                <span class="tracking-wide">Bildungsweg</span>
                            </div>
                            <ul class="list-inside space-y-2">
                            @foreach ($profile->educations as $edu)
                                <li>
                                    <div class="text-blue-600">{{$edu->abschluss}} </div>
                                    <div class="text-gray-600">{{$edu->bildungseinrichtung}} </div>
                                    <div class="text-gray-500 text-s">{{$edu->started_at->format('d/m/Y')}} - {{ $edu->finished_at?->format('d/m/Y') }}</div>
                                    <div class="text-gray-500 text-s">{{$edu->fachrichtung}}</div>
                                    <div class="text-gray-500 text-s">{{$edu->orth}}</div>
                                </li>
                                @endforeach                           
                            </ul>
                        </div>    
                 <!-- End of Beruferfahrungen grid --> 
                </div>        
                <!-- End of profile tab -->
            </div>
    </div>
   
    <footer class="w3-container w3-teal w3-center w3-margin-top">
<p>Ein Angebot der <a href="https://www.stimme.de/" target="_blank">Stimme</a></p>
</footer>
</body>
</html>
