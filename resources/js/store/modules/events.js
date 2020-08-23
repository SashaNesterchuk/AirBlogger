import axios from 'axios'
import * as types from '../mutation-types'

export const state = {
  events: {},
  event: {}
}

export const getters = {
  countEvent: (state) => (month) => {
    return state.events[month]?.length
  },

  eventById: (state) => (month) => {
    if (!state.events[month]) return {}

    let events = JSON.parse(JSON.stringify(state.events[month]))

    let answer = new Map()
    /**
     * Group by day
     */
    events.forEach((event) => {
      let day = new Date(event.event_date).getDate()

      if (answer.has(day)) {
        answer.get(day).push(event)
      } else {
        answer.set(day, [event])
      }
    })

    return answer
  }
}

export const mutations = {
  [types.CLEAR_TYPE](state) {
    state.event = {}
  },

  [types.SET_EVENT](state, data) {
    state.event = data
  },

  [types.SET_EVENTS](state, data) {
    state.events = data
  },

  [types.UPDATE_EVENT](state, data) {
    state.event = data
  }
}

export const actions = {
  changeOder({ commit }, pyaload) {
    axios
      .put(`/api/events/${pyaload.eventId}`, {
        increment_id: pyaload.increment_id,
        decrement_id: pyaload.decrement_id
      })
      .then(({ data }) => {
        commit(types.UPDATE_EVENT, data)
      })
  },

  fetch({ commit }, { year }) {
    axios.get('/api/events', { params: { year: year } }).then(({ data }) => {
      commit(types.SET_EVENTS, data)
    })
  },

  load({ commit }, payload) {
    axios.get(`/api/events/${payload.id}`).then(({ data }) => {
      commit(types.SET_EVENT, data)
    })
  },

  month({ commit }, { year, month }) {
    axios
      .get('/api/events/month', {
        params: { year, month }
      })
      .then(({ data }) => {
        commit(types.SET_EVENTS, { [month]: data })
      })
  }
}
