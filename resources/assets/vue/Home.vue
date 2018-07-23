<template>
    <full-calendar :events="fcEvents" locale="en"></full-calendar>
</template>

<script>
    import { FullCalendar } from 'vue-full-calendar'
    export default {
        components: {
            FullCalendar,
        },
    }

   /* var demoEvents = [
	    {
            title : 'Sunny Out of Office',
            start : '2016-08-25',
            end : '2017-07-27'
        }
    ]

    export default {
        data () {
            return {
            fcEvents : demoEvents
            }
        },
        components : {
            FullCalendar	
        }
    }*/
</script>