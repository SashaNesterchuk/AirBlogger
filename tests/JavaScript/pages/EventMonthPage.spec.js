import { shallowMount, createLocalVue } from '@vue/test-utils'
import EventMonthPage from '~/pages/events/EventMonthPage'
import Vuex from 'vuex'

const localVue = createLocalVue()
localVue.use(Vuex)

describe('EventMonthPage', () => {
  let wrapper
  let store
  let actions
  let getters

  beforeEach(() => {
    actions = {
      'events/month': sinon.mock()
    }

    store = new Vuex.Store({
      modules: {
        events: {
          namespaced: true,
          state: {
            events: {}
          },
          getters: {
            eventById: () => (id) => {
              return {}
            }
          }
        }
      },
      actions
    })

    wrapper = shallowMount(EventMonthPage, {
      localVue,
      store,
      mocks: {
        $route: {
          params: { month: 1, year: 2020 }
        }
      }
    })
  })

  it('show component', () => {
    expect(wrapper.is(EventMonthPage)).to.be.true
  })
})
