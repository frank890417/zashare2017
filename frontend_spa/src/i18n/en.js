let data = {
  global: {
    name: "ZA SHARE",
  },
  nav: {
    about: "About ZA SHARE",
    expo: "Past EXPOS",
    shop: "Online Shop",
    search: "Search Site",
    manage: "Manage",
    hello: "Hi ",
    login: "Login",
    search: "Search site",
  },
  menu: {
    hello: "Hi ",
    logout: "Log out",
    profile: "Profile",
    label_id: "ID Number",
    manage: "Manage",
    label_occupation: "Present Occupation",
    label_position: "Current Position",
    label_email: "Email",
    label_status: "Status",
    label_registexpo: "Expo Application",
    label_registexpospeak: "Zac. (ZA-accelerator) Demo",
    label_registexpoworkshop: "ZA WORKSHOP",
    status_registered: "Registered",
    status_not_registered: "Not Registered",
    status_open_register: "Now accepting"




  },
  page_about: {
    sub_slogan: `” ZA SHARE setup fantastic scenes and explorations into life, connecting the diversity of education and culture to be recognized as Asia’s most influential innovation and exhibition brand.”`,
    numberlabels: [
      "previous expos",
      "participated teams",
      "participated teams",
      "cities oversea took part",
      "expo visitors accumulated",
      "online community reach"
    ],
    content: [
      "Broad-based learning is a fundamental ability for future talent. Only with diversity and dissimilarity, can fertile ground for talent innovation be created.ZA SHARE is a social school that uses cities as units, everyday life as content and people as core.ZA is the transliteration of the Chinese word for ‘comprehensiveness’ and from Z to A, it implies engagement from the bottom - up, whereas SHARE indicates connection and sharing.",
      `ZA SHARE is a grassroots movement for the innovation of education and culture
      in Taiwan.It was established by Ozzie Su in 2015, who longed to build a utopia with a
variety of learning pathways that allowed people aged 1-99 to find their life passion.
      Thus, he recruited non-traditional educational and cultural creativity from Chinese
society and organized a yearly expo for innovative education.Using brand new
      curating practices, ZA SHARE is a unique platform for exhibitors from various
backgrounds to work together and exchange ideas without boundaries.This also
allows exploration and surprises to happen, which is a catalyst for the
transformation of education into diverse lifestyles and for talent cultivation.
      Furthermore, ZA SHARE continued to set up an education startup accelerator,
    assisting businesses with innovative educational philosophies to develop their
startup step by step.“If everyone could work out of passion, the society would be so
much more powerful.”`
    ],
    themes: [
      'Imagine',
      'Explore',
      'Diversify'
    ],
    title_brand: "Past EXPOS"
  },
  form: {
    label_next: "Next",
    label_back: "Back",
    label_submit: "Submit",
    label_upload: "Upload file",
    step_confirm: "Confirmation",
    step_complete: "Submit completed",
    confirm_dialog_title: "Are you sure to submit? You will not be able to edit the data after confirmation.",
    confirm_dialog_content: "Final confirmation",
    confirm_dialog_yes: "Confirm",
    confirm_dialog_no: "Cancel",
    update_success: "Data uploaded",
    update_cancel: "Cancel",
    data_not_complete: "Data not required or wrong format, please check the form again."

  },
  regist_expo: {
    title: "Exhibition Application Form",
    sub_title: "To make sure of successful registration, refer to the regulations, schedule and process in the exhibition manual.",

    confirm_title: "Congratulations! You have submited the application.",
    confirm_text: "請再次確認所有填寫資料後按下「確認送出」，並於三日內繳交報名費，才算完成所有報名手續呦！<br>＊海外參展者（含中國、港、澳等地區）享「免報名費」優惠。<br><br>報名費繳款帳戶：<br>銀行名稱－第一銀行永春分行 (007)<br>帳戶名稱－雜學股份有限公司<br>帳號－157-10-029362<br><br>遞交報名申請後，將由主辦單位以E-mail回覆收到線上報名資料，及提供上列報名費繳費資訊。若提交後三日內未收到相關回覆，請主動聯繫主辦單位查詢。<br><br>我確認資料已經正確無誤，送出後將無法修改<br>",
    complete_text: "謝謝你願意和我們一同為教育而努力！<br>最後甄選入選名單將於2018/07/10公布在官方網站。<br><br>如欲報名「ZA WORKSHOP 雜工坊」及「Zac. 教育新創短講評選」請繼續填寫表單：",

    sections: [
      {
        id: 0,
        title: "A. Exhibition information",
        questions: [
          {
            title: "1. Booth type",
            prop: "type",
            options: [
              { label: "Basic booth(width 1m x depth 1m x height 2.5m)", value: "基礎單位 (1m*1m 限高2.5m)" },
              { label: "Standard booth(width 3m x depth 2m x height 2.5m)", value: "標準單位 (2m*3m 限高2.5m)" },
              { label: "Advanced booth(width 6m x depth 2m x height 2.5m)", value: "進階單位 (2m*6m 限高2.5m)" },
            ]
          },
          {
            title: "2. Exhibitor category (The organizer reserves the ultimate right to assign the exhibitor to specific categories)",
            prop: "theme",
            options: [
              { label: "Education innovation", value: "教育創新" },
              { label: "Cultural practice", value: "文化實踐" },
              { label: "Life exploration", value: "生活探索" },
              { label: "Professional training", value: "專業培育" }
            ] 
          },
          {
            title: "3. Have you participated in Za Share’s past exhibitions ?",
            explain: "",
            prop: "attended",
            options: [
              { label: "First - timer", value: "首次參展" },
              { label: "2015 Naughty Education Fest", value: "2015不太乖教育節" },
              { label: "2016 ZA SHARE EXPO", value: "2016雜學校" },
              { label: "2017 ZA SHARE EXPO", value: "2017雜學校" }
            ]
          },


          
        ]
      },

      {
        title: "B. Applicant Information",
        id: 1,
        required: true,
        questions: [
          // {
          //   title: "1. 申請單位/個人名稱 - 中文",
            // prop: "name_cht",
          // },
          {
            title: "1. Name",
            prop: "name_eng",
          },
          {
            title: "2. Self-introduction (50-80 words)",
            type: "textarea",
            prop: "description",
            settings: {
              maxlength: 300
            },
          },
          {
            title: "3. Your current target audience (choose two most relevant groups)",
            type: "select",
            prop: "target_audience",
            settings: {
              multiple: true,
              'multiple-limit': 2
            },
            options: [
              {label: "Pre - schoolers" , value: "學齡前幼兒"},
              {label: "elementary students" , value: "國小生"},
              {label: "junior high students" , value: "國中生"},
              {label: "senior high students" , value: "高中生"},
              {label: "homeschoolers" , value: "自學生"},
              {label: "college and above students" , value: "大專以上學生"},
              {label: "fresh graduates" , value: "職場新鮮人"},
              {label: "young adults" , value: "青壯年"},
              {label: "parents" , value: "家長"},
              {label: "educators" , value: "教育工作者"},
              {label: "investors" , value: "投資人"},
              {label: "entrepreneurs" , value: "創業者"},
              {label: "schools" , value: "學校單位"},
              {label: "public sector" , value: "公部門"},
              {label: "others" , value: "其他"}
            ]
          },
          {
            title: "4. Target audience you wish to approach at Za Share (choose two most desired groups)",
            type: "select",
            prop: "want_audience",
            settings: {
              multiple: true,
              'multiple-limit': 2
            },
            options: [
              { label: "Pre - schoolers", value: "學齡前幼兒" },
              { label: "elementary students", value: "國小生" },
              { label: "junior high students", value: "國中生" },
              { label: "senior high students", value: "高中生" },
              { label: "homeschoolers", value: "自學生" },
              { label: "college and above students", value: "大專以上學生" },
              { label: "fresh graduates", value: "職場新鮮人" },
              { label: "young adults", value: "青壯年" },
              { label: "parents", value: "家長" },
              { label: "educators", value: "教育工作者" },
              { label: "investors", value: "投資人" },
              { label: "entrepreneurs", value: "創業者" },
              { label: "schools", value: "學校單位" },
              { label: "public sector", value: "公部門" },
              { label: "others", value: "其他" }
            ]
          },
          {
            title: "5. Selling at the exhibition?",
            type: "select",
            prop: "have_sell",
            options: [
              { label: "Yes (include your products and prices in the application proposal presentation)", value: 1 },
              { label: "No", value: 0 }
            ]
          },
          {
            title: "6. Talk about your exhibition plan in a presentation with no more than 20 slides. (The organizer will select Za Star Award winners based on the document)",
            type: "file",
            prop: "file_proposal",
            explain: `File size: 20MB / PDF format only
                      <br>
                      <br>Suggested outline:
                      <br>1. Brand/team/individual introduction
                      <br>2. Your views on education and relevance to educational innovation (reason for participation in the exhibition)
                      <br>3. Your exhibition theme or issue to address (if your theme is not directly related to your brand, you may elaborate on it)
                      <br>4. Your exhibition content and presentation (your focal point for the exhibition and how you will present it)
                      <br>5. Your interactive experience or activity planning in booth (which shall not affect the flow of foot traffic)
                      <br>6. Booth design
                      <br>7. Past exhibition experiences or activity results
                      <br>8. If you’d like to sell products or collect personal information, please tell us about your products, prices or ways of collecting personal information such as games, flyers and coupons.
            `
          },
          {
            title: "7. Why you want to participate in the exhibition? (50 words)",
            type: "textarea",
            prop: "attend_reason",
            settings: {
              maxlength: 100
            },
          },
          {
            title: "8. Any other information? (50 words) ",
            type: "textarea",
            required: false,
            prop: "other",
            settings: {
              maxlength: 200
            },
          }
        ]
      },
      {
        title: "C. Contact Information",
        id: 2,
        required: true,
        questions: [
          {
            title: "1. Primary contact person Name(designated individual preferred)",
            prop: "main_contact_name",
          }, {
            title: "Mobile number",
            prop: "main_contact_phone",
          }, {
            title: "Email",
            prop: "main_contact_email",
          }, {
            title: "2. Secondary contact person Name",
            prop: "secondary_contact_name",
          }, {
            title: "Mobile number",
            prop: "secondary_contact_phone",
          }, {
            title: "Email",
            prop: "secondary_contact_email",
          }
        ],
      }
    
    
    ]
  },

  regist_expoworkshop: {
    title: "Za Workshop Application Form",
    sub_title: "Every workshop session lasts 90 minutes including entering and exiting the venue and accommodates up to 30 people.<br><br>The exhibitors need to pay USD 380 per session and provide relevant course materials if any.The organizer is responsible for session registration and payment collection(TWD 500 per session for each participant.) (For more information, refer to p.18 of the manual)",

    confirm_title: "恭喜你即將完成雜工坊申請！",
    confirm_text: "請再次確認所有填寫資料後按下「確認送出」，主辦單位收到提案申請後將以E-mail回覆確認。若提交後三日內未收到相關回覆，請主動聯繫主辦單位查詢。",
    complete_text: "謝謝貴團隊的用心籌劃！<br>最後甄選結果與場次安排將於2018/07/10公布在官方網站。",

    sections: [
      {
        id: 0,
        title: "A. Basic Information",
        questions: [
          {
            title: "1.	Session types",
            type: "select",
            prop: "class_type",
            options: [
              { label: "Art creation", value: "藝術體驗創作" },
              { label: "Traditional craft education", value: "傳統工藝教學" },
              { label: "Interactive teaching", value: "互動式教學" },
              { label: "Science experiment", value: "科學動手實驗" },
              { label: "Innovative teaching plan sharing", value: "創新教案分享與教學" },
              { label: "Small - scale panel discussion", value: "小型分享座談" },
              { label: "Outdoor course", value: "戶外活動" },
              { label: "Others", value: "其他 "}
            ]
          },
          {
            title: "2.	Participant eligibility",
            prop: "class_audience",
            explain: "Any eligibility requirements such as status or age? For family only or for a specific age group, please choose “Others” and write down your requirements",
            required: false,
            settings: {
              placeholder: "No limitations (open to public)"
            }
          },
          {
            title: "3.	Estimated number of participants",
            type: "number",
            prop: "class_person_count",
            explain: "The venue can accommodate up to 30 people."
          }
          ,
          {
            title: "4.	Preferred sessions",
            type: "select",
            explain: "Select multiple sessions for possible arrangement. The organizer has the right for final review and decision-making, and the exhibitor may not oppose to the decision made.",
            prop: "class_time",
            settings: {
              multiple: true
            },
            options: [
              {label: "10 / 5(Fri) 13: 00 - 14: 30", value:"10/5 (五) 13:00-14:30"},
              {label: "10 / 5(Fri) 15: 00 - 16: 30", value:"10/5 (五) 15:00-16:30"},
              {label: "10 / 5(Fri) 17: 00 - 18: 30", value:"10/5 (五) 17:00-18:30"},
              {label: "10 / 6(Sat) 10: 00 - 11: 30", value:"10/6 (六) 10:00-11:30"},
              {label: "10 / 6(Sat) 13: 00 - 14: 30", value:"10/6 (六) 13:00-14:30"},
              {label: "10 / 6(Sat) 15: 00 - 16: 30", value:"10/6 (六) 15:00-16:30"},
              {label: "10 / 6(Sat) 17: 00 - 18: 30", value:"10/6 (六) 17:00-18:30"},
              {label: "10 / 7(Sun) 10: 00 - 11: 30", value:"10/7 (日) 10:00-11:30"},
              {label: "10 / 7(Sun) 13: 00 - 14: 30", value:"10/7 (日) 13:00-14:30"},
              {label: "10 / 7(Sun) 15: 00 - 16: 30", value:"10/7 (日) 15:00-16:30"},
              {label: "10 / 7(Sun) 17: 00 - 18: 30", value:"10/7 (日) 17:00-18:30"}
            ]
          },
          {
            title: "5. Talk about your activity proposal with no more than 10 pages. (The organizer will select Za Workshop winners based on the document)",
            type: "file",
            prop: "class_proposal",
            explain: `File size: 20MB / PDF format only<br>
<br>
<br>Suggested outline: 
<br>1. Background introduction including you brand / team / lecturer
<br>2. Your theme or issue to address (if your theme is not directly related to your brand, you may elaborate on it)
<br>3. Activity content including target audience, activity planning, execution and division of labor
<br>4. Past exhibition experiences or activity results
`
          }
        ]
      },
      {
        title: "B. Contact Information",
        id: 1,
        required: true,
        questions: [
          {
            title: "1. Primary contact person Name(designated individual preferred)",
            prop: "main_contact_name",
          }, {
            title: "Mobile number",
            prop: "main_contact_phone",
          }, {
            title: "Email",
            prop: "main_contact_email",
          }, {
            title: "2. Secondary contact person Name",
            prop: "secondary_contact_name",
          }, {
            title: "Mobile number",
            prop: "secondary_contact_phone",
          }, {
            title: "Email",
            prop: "secondary_contact_email",
          }
        ],
      }
    ]
  },
  regist_expospeak: {
    title: "Zac. Demo Day Application Form ",
    sub_title: "Za Share tries to create an open, resource-abundant platform. Ten nominees will exhibit in Za Concept Exhibition and the organizer will specially curate an exhibition for them. Every nominee will be charged USD 750 for customized booth space. This will not only serve as a platform for marketing exposure but also provide an opportunity for them to be observed by other exhibitors, members of the press and our VIPs. (For information about application and selection, refer to p.19 of the manual)",

    confirm_title: "恭喜你即將完成「Zac. 教育新創短講評選」申請！",
    confirm_text: "請再次確認所有填寫資料後按下「確認送出」，主辦單位收到提案申請後將以E-mail回覆確認。若提交後三日內未收到相關回覆，請主動聯繫主辦單位查詢。",
    complete_text: "謝謝貴團隊的用心籌劃！<br>最後甄選結果與場次安排將於2018/07/10公布在官方網站。",

    sections: [
      {
        title: "A. Basic Information",
        id: 0,
        required: true,
        questions: [
          {
            title: "1.	If nominated, do you agree to have the organizer design for you?",
            type: "select",
            prop: "agree_plan",
            options: [
              {
                label: "Yes, I will exhibit in Za Concept Exhibition. (Za Share will specially curate an exhibition for the nominees)", value: 1 },
              {
                label: "No, I wish to stay in ZA EXPO. (Exhibitors design their own booths)", value: 0 }
            ]
          },
          {
            title: "2.	Number of team members",
            type: "number",
            prop: "team_person_count",
          },
          {
            title: "3.	Have you received any investment?",
            type: "select",
            prop: "has_money",
            options: [
              { label: "No", value: 1 },
              { label: "Yes", value: 0 }
            ]
          },

        ]
      },
      {
        title: "B. Help us to get to know you more",
        id: 1,
        required: true,
        questions: [
          {
            title: "1.	Describe the content of your business (50-80 words)",
            type: "textarea",
            prop: "startup_content",
            settings: {
              maxlength: 300
            }
          }, {
            title: "2.	Describe your target audience (50-80 words)",
            type: "textarea",
            prop: "startup_audience",
            settings: {
              maxlength: 300
            }
          }, {
            title: "3.	Describe the difficulties you are encountering (50-80 words)",
            type: "textarea",
            prop: "startup_difficult",
            settings: {
              maxlength: 300
            }
          }, {
            title: "4.	Describe the education issues you wish to address (50-80 words)",
            type: "textarea",
            prop: "startup_problem",
            settings: {
              maxlength: 300
            }
          }, {
            title: "5.	What impact will your team/products bring to society?  (50-80 words)",
            type: "textarea",
            prop: "startup_power",
            settings: {
              maxlength: 300
            }
          }, {
            title: "6. Talk about your pitch proposal in a presentation with no more than 20 slides. (The organizer will select Zac. nominees based on the document)<br><br>File size: 20MB / PDF format only",
            type: "file",
            prop: "startup_proposal",
            explain: `Suggested outline: 
<br>1. Background introduction including your brand/team
<br>2. Business objectives
<br>3. Content of your business (target market, segmentation, competitive analysis)
<br>4. Implementation (current development, business model, achievements)
<br>5. Implementation milestones and planning
<br>6. Human resource allocation
<br>7. Budget allocation and usage
<br>8. Risk evaluation
<br>9. Expected results
`,
          }
        ]
      },
      {
        title: "C. Contact Information",
        id: 2,
        required: true,
        questions: [
          {
            title: "1. Primary contact person Name(designated individual preferred)",
            prop: "main_contact_name",
          }, {
            title: "Mobile number",
            prop: "main_contact_phone",
          }, {
            title: "Email",
            prop: "main_contact_email",
          }, {
            title: "2. Secondary contact person Name",
            prop: "secondary_contact_name",
          }, {
            title: "Mobile number",
            prop: "secondary_contact_phone",
          }, {
            title: "Email",
            prop: "secondary_contact_email",
          }
        ],
      }
    ]

  }



}



import zh_base from './zh'
let formnames = ["regist_expo"]

formnames.forEach(formname=>{
  let sts = zh_base[formname].sections

  function assignAttrs(from, to) {
    Object.keys(from).forEach(key => {
      if (typeof from[key] !== "object") {
        to[key] = from[key]
      }
    })
  }
  sts.forEach(st => {
    let dataExist = data[formname].sections.find(stt => stt.id == st.id)
    let engst = data[formname].sections.find(stt => stt.id == st.id) || { questions: [] }
    let clone = JSON.parse(JSON.stringify(st))

    assignAttrs(engst, clone)
    assignAttrs(clone, engst)
    if (!dataExist) {
      data[formname].sections.push(clone)
    }
    clone.questions.forEach(qzh => {
      let qexist = engst.questions.find(q => q.prop == qzh.prop)
      let qen = engst.questions.find(q => q.prop == qzh.prop) || {}
      assignAttrs(qen, qzh)
      assignAttrs(qzh, qen)
      // if (!qexist) {
      //   engst.questions.push(qen) 
      // }

    })

  })
})



export default data