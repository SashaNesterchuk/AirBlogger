import { shallowMount, createLocalVue } from '@vue/test-utils'
import EventBlogger from '~/components/event/EventBlogger'
import Vuex from 'vuex'

const localVue = createLocalVue()
localVue.use(Vuex)

describe('EventBlogger', () => {
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

    wrapper = shallowMount(EventBlogger, {
      localVue,
      store,
      mocks: {
        $route: {
          params: { month: 1, year: 2020 }
        }
      },
      propsData: {
        blogger: {
          avatar: 'https://lorempixel.com/640/480/?10340',
          description:
            'Distinctio itaque qui sed sit voluptatem. Rerum laudantium iusto odio tenetur.',
          id: 14,
          name: 'Mr. Buster Kozey',
          pivot: { event_id: 22, blogger_id: 14, blogger_order: 1 }
        },
        countBloggers: 1
      }
    })
  })

  it('show component', () => {
    expect(wrapper.is(EventBlogger)).to.be.true
  })

  describe('order button', () => {
    it('hide up', () => {
      expect(wrapper.contains(`[data-test="btn-up"]`)).to.be.false
    })

    it('hide down', () => {
      expect(wrapper.contains(`[data-test="btn-down"]`)).to.be.false
    })
  })
})
