<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import {ref} from 'vue';

const page = usePage();


</script>

<template>
<div id="application-sidebar" class=" sidebar hs-overlay hs-overlay-open:translate-x-0 -translate-x-full [--overlay-backdrop:false] [--body-scroll:true] transition-all duration-300 transform hidden fixed top-0 start-0 bottom-0 z-[60] w-64 bg-white border-e border-gray-200 pt-4 pb-10 overflow-y-auto lg:block lg:translate-x-0 lg:end-auto lg:bottom-0 [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-slate-700 dark:[&::-webkit-scrollbar-thumb]:bg-slate-500 dark:bg-gray-800 dark:border-gray-700" tabindex="1">

    <div class="flex justify-between border-b border-gray-200 dark:border-gray-600 pl-6 pr-3 pb-[14px]  ">
      <div class="text-center">
      <Link class="flex-none text-xl font-semibold text-gray-600 dark:text-gray-200 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :href="route('dashboard')" aria-label="Brand">MDEV Dashboard</Link>
      </div>
    </div>

    <nav class="hs-accordion-group p-6 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
      <ul class="space-y-2.5">
        <li>
          <Link :href="route('dashboard')" class="flex items-center gap-x-3.5 py-2 px-2.5  bg-gray-100 text-sm text-slate-700 rounded-lg hover:bg-gray-400 dark:hover:bg-gray-600 dark:text-white dark:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'bg-gray-300 dark:bg-gray-900': $page.url === '/dashboard' || $page.url.startsWith('/dashboard?')}">
            <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" ><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            Dashboard
          </Link>
        </li>

        <li class="hs-accordion space-y-1" :class="{ 'active': $page.url.startsWith('/application') }" id="account-accordion">
          <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'ring-1 ring-gray-400 dark:ring-gray-600': $page.url.startsWith('/application') }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="18" width="18">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
            </svg>
            Application

            <svg class="hs-accordion-active:block ms-auto hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

            <svg class="hs-accordion-active:hidden ms-auto block w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </button>

          <div id="account-accordion-child" class="hs-accordion-content bg-gray-300 dark:bg-gray-900 pb-2 rounded-md w-full overflow-hidden transition-[height] duration-300 hidden" :style="{ display: $page.url.startsWith('/application') ? 'block' : 'none' }">
            <ul class="pt-2 px-2 space-y-1">

              <li>
                <Link :href="route('application.index')" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'bg-gray-200 dark:bg-gray-800': $page.url === '/application' || $page.url.includes('/edit') || $page.url.startsWith('/application?')}">
                  Application List
                </Link>
              </li>
              <li>
                <Link :href="route('application.create')" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'bg-gray-200 dark:bg-gray-800': $page.url === '/application/create' && !$page.url.startsWith('/application?')}">
                  Create Application
                </Link>
              </li>

            </ul>
          </div>
        </li>

 
        <li class="hs-accordion space-y-1" :class="{ 'active': $page.url.startsWith('/service') }" id="account-accordion">
          <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'ring-1 ring-gray-400 dark:ring-gray-600': $page.url.startsWith('/service') }">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" height="18" width="18">
              <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z" />
            </svg>

            Services

            <svg class="hs-accordion-active:block ms-auto hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

            <svg class="hs-accordion-active:hidden ms-auto block w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </button>

          <div id="account-accordion-child" class="hs-accordion-content bg-gray-300 dark:bg-gray-900 pb-2 rounded-md w-full overflow-hidden transition-[height] duration-300 hidden" :style="{ display: $page.url.startsWith('/service') ? 'block' : 'none' }">
            <ul class="pt-2 px-2 space-y-1">

              <li>
                <Link :href="route('service.index')" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'bg-gray-200 dark:bg-gray-800': $page.url === '/service' || $page.url.includes('/edit') || $page.url.startsWith('/service?')}">
                  Service List
                </Link>
              </li>
              <li>
                <Link :href="route('service.create')" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'bg-gray-200 dark:bg-gray-800': $page.url === '/service/create' && !$page.url.startsWith('/service?')}">
                  Create Service
                </Link>
              </li>

            </ul>
          </div>
        </li>


        <li class="hs-accordion space-y-1" :class="{ 'active': $page.url.startsWith('/client') }" id="account-accordion">
          <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'ring-1 ring-gray-400 dark:ring-gray-600': $page.url.startsWith('/client') }">
            <svg class="flex-shrink-0 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="15" r="3"/><circle cx="9" cy="7" r="4"/><path d="M10 15H6a4 4 0 0 0-4 4v2"/><path d="m21.7 16.4-.9-.3"/><path d="m15.2 13.9-.9-.3"/><path d="m16.6 18.7.3-.9"/><path d="m19.1 12.2.3-.9"/><path d="m19.6 18.7-.4-1"/><path d="m16.8 12.3-.4-1"/><path d="m14.3 16.6 1-.4"/><path d="m20.7 13.8 1-.4"/></svg>
            Client

            <svg class="hs-accordion-active:block ms-auto hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

            <svg class="hs-accordion-active:hidden ms-auto block w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </button>

          <div id="account-accordion-child" class="hs-accordion-content bg-gray-300 dark:bg-gray-900 pb-2 rounded-md w-full overflow-hidden transition-[height] duration-300 hidden" :style="{ display: $page.url.startsWith('/client') ? 'block' : 'none' }">
            <ul class="pt-2 px-2 space-y-1">

              <li>
                <Link :href="route('client.index')" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'bg-gray-200 dark:bg-gray-800': $page.url === '/client' || $page.url.includes('/edit') || $page.url.startsWith('/client?')}">
                  Client List
                </Link>
              </li>
              <li>
                <Link :href="route('client.create')" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'bg-gray-200 dark:bg-gray-800': $page.url === '/client/create' && !$page.url.startsWith('/client?')}">
                  Create Client
                </Link>
              </li>

            </ul>
          </div>
        </li>


        <li class="hs-accordion space-y-1" :class="{ 'active': $page.url.startsWith('/reports') }" id="account-accordion">
          <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 hs-accordion-active:text-blue-600 hs-accordion-active:hover:bg-transparent text-sm text-slate-700 rounded-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:hs-accordion-active:text-white dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'ring-1 ring-gray-400 dark:ring-gray-600': $page.url.startsWith('/reports') }">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="18" height="18">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
          </svg>

            Reports

            <svg class="hs-accordion-active:block ms-auto hidden w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>

            <svg class="hs-accordion-active:hidden ms-auto block w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
          </button>

          <div id="account-accordion-child" class="hs-accordion-content bg-gray-300 dark:bg-gray-900 pb-2 rounded-md w-full overflow-hidden transition-[height] duration-300 hidden" :style="{ display: $page.url.startsWith('/reports') ? 'block' : 'none' }">
            <ul class="pt-2 px-2 space-y-1">

              <li>
                <Link :href="route('account.index')" class="flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-slate-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 dark:text-slate-400 dark:hover:text-slate-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" :class="{'bg-gray-200 dark:bg-gray-800': $page.url === '/reports/account' || $page.url.includes('/edit') || $page.url.includes('/account?')}">
                  Account
                </Link>
              </li>
              
            </ul>
          </div>
        </li>


      </ul>
    </nav>
  </div>
</template>


<style scoped> 

</style>
