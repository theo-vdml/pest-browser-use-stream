<script lang="ts" setup>

    import { useStream } from "@laravel/stream-vue";

    const { send, data, isFetching, isStreaming } = useStream("/stream");

</script>

<template>
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white border border-gray-200 rounded-lg shadow-sm">

        <h1 class="text-2xl font-bold text-gray-800 mb-5">
            Stream Demo Pest Browser Testing
        </h1>

        <button
            class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded transition-colors duration-200 mb-6 cursor-pointer"
            @click="send()">
            Click to Start Streaming
        </button>

        <ul class="flex gap-6 mb-4 text-sm text-gray-600">
            <li class="flex items-center gap-2">
                <span class="font-semibold">isFetching:</span>
                <span :class="isFetching ? 'text-green-600 font-bold' : 'text-gray-400'">{{ isFetching }}</span>
            </li>
            <li class="flex items-center gap-2">
                <span class="font-semibold">isStreaming:</span>
                <span :class="isStreaming ? 'text-green-600 font-bold' : 'text-gray-400'">{{ isStreaming }}</span>
            </li>
        </ul>

        <div>
            <p class="font-semibold text-gray-700 mb-2">Data:</p>
            <div
                class="bg-gray-50 border border-gray-200 rounded p-4 h-64 overflow-y-auto font-mono text-xs text-gray-800 whitespace-pre-wrap">
                {{ data || '// No data received yet...' }}
            </div>
        </div>

        <div class="border-t border-gray-100 pt-6">
            <div class="bg-amber-50 border border-amber-200 rounded-md p-5 text-amber-900">
                <h3 class="font-bold text-lg mb-2 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Issue Context
                </h3>

                <p class="text-sm mb-3 leading-relaxed">
                    This demo reproduces a specific issue when combining <code
                        class="bg-amber-100 px-1 py-0.5 rounded font-mono text-amber-800">useStream</code> with
                    <strong>Pest Browser Testing</strong>.
                </p>

                <ul class="list-disc list-inside text-sm space-y-2 opacity-90">
                    <li>
                        <strong>Expected behavior:</strong> The data box above populates incrementally.
                    </li>
                    <li>
                        <strong>Actual behavior (in Test):</strong> When running the test, the stream freezes in the
                        <code class="font-mono text-xs">isFetching</code> state, then completes without updating the UI.
                    </li>
                    <li>
                        <strong>The Anomaly:</strong> The streamed data is not lost; surprisingly, it is logged directly
                        to the <em>terminal console</em> where the Pest process is running, bypassing the browser
                        entirely.
                    </li>
                </ul>
                <img src="/image.png" alt="Pest Browser Stream Issue" class="border border-gray-200 rounded mt-2" />
                <p class="italic">See the first two lines of the terminal console output above. That's the streamed
                    data being logged directly to the terminal instead of the browser UI.</p>
                <h4 class="mt-4 bold underline">Video Demonstration</h4>
                <video controls class="border border-gray-200 rounded mt-2">
                    <source src="/video.mp4" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

    </div>
</template>
