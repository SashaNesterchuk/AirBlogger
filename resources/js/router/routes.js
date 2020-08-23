const EventYears = () =>
  import('~/pages/events/EventYearsPage').then((m) => m.default || m)
const EventMonth = () =>
  import('~/pages/events/EventMonthPage').then((m) => m.default || m)
const EventPage = () =>
  import('~/pages/events/EventPage').then((m) => m.default || m)

export default [
  { path: '/', name: 'event.years', component: EventYears },
  { path: '/events/:year/:month', name: 'events.month', component: EventMonth },
  { path: '/event/:id', name: 'event', component: EventPage }
]
