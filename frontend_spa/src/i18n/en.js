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
    label_birthday: "Birthday",
    label_phone: "Phone",
    label_status: "Status",
    label_registexpo: "Expo Application",
    label_registexpospeak: "Zac. (ZA-accelerator) Demo",
    label_registexpoworkshop: "ZA WORKSHOP",
    label_expo_regist_end: "Deadline：2018.06.15",
    status_registered: "Registered",
    status_not_registered: "Not Registered",
    status_open_register: "Now accepting",
    regist_id: 'Application Number',
    regist_name: 'Application Name',
    regist_expo_first: "Please regist EXPO first",
    expo_not_paid: "Unpaid",
    expo_paid_confirming: "Confirming by Organizer",
    expo_paid_confirmed: "Paid",
    news_title: "ZA SHARE News",
    label_coupon: "Coupon",
    get_coupon: "Click to get coupon",
    coupon_cannot_get: "Not qualified",
    title_coupon_zacourse: "ZA COURSE",
    title_coupon_normal: "ZA COUPON",
    register_mobile_warning: "Please use computer to complete the registration process.",





  },
  page_news: {
    title: "Posts"
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
    title_brand: "Past EXPOS",
    expos: [
      {
        year: 2017,
        title: "2nd ZA SHARE EXPO",
        subtitle: "The attitude of the year promotes <br>“My Braveducation”",
        features: ["Reserved all exhibition spaces in Huashan 1914 Creative Park and set a record-breaking visitor number of fifty thousand people", "Originator of Innovative Education DemoDay"],
        report_cover: "/static/img/ZA EXPO/index/ZAexpo-banner-2017-2.jpg",
      }, {
        year: 2016,
        title: "1nd ZA SHARE EXPO",
        subtitle: "The attitude of the year promotes <br>“Learn to be, not taught to fit.”",
        features: ["First ticket sale, setting the record for the highest single day gross in Huashan’s history", "Became the largest innovative education expo in Asia"],
        report_cover: "/static/img/ZA EXPO/index/ZAexpo-banner-2016-2.jpg",
      }, {
        year: 2015,
        title: "Predecessor of ZA SHARE EXPO - NAUGHTY EDUCATION FEST",
        subtitle: "The attitude of the year promotes <br>“Behaving yourself by being yourself”",
        features: ["First charitable non-traditional educational innovation expo in Taiwan", "Named as Huasan’s Best Local Exposition Brand"],
        report_cover: "/static/img/ZA EXPO/index/ZAexpo-banner-2015-2.jpg",
      }
    ]
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

    confirm_title: "It's almost completed!",
    confirm_text: "Please reconfirm your application, and press the “Submit” button.<br>We will send the application confirmed e-mail within three days. <br>If you do not receive the reply within three days, don’t hesitate to reach out to the organizer.<br><br>I confirmed that the application has been corrected and completed. It will not be modifiable after submit.",
    complete_text: "Thank you for creating the better education with us.<br>The result will be announced at 07/10（Tue).<br>It will be reveal on the \"ZA SHARE\" official website.",

    sections: [
      {
        title: "A. Exhibition information",
        id: 0,
        required: true,
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
          {
            title: "4. Which the group or individual is from?",
            type: "select",
            prop: "is_foreign",
            options: [
              { label: "Taiwan", value: 0 },
              { label: "overseas", value: 1 },

            ]
          },
          {
            title: "5. The country/city you currently lived in or your group located at",
            prop: "foreign_country",
            display(data) {
              return data['is_foreign'] == 1
            }
          }


          
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

    confirm_title: "It's almost completed!",
    confirm_text: "Please reconfirm your application, and press the “Submit” button.<br>We will send the application confirmed e-mail within three days. <br>If you do not receive the reply within three days, don’t hesitate to reach out to the organizer.<br><br>I confirmed that the application has been corrected and completed. It will not be modifiable after submit.",
    complete_text: "Thank you for preparing.<br>The result will be announced at 07/10（Tue).It will be reveal on the \" Za Share \" official website.",
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

    confirm_title: "It's almost completed!",
    confirm_text: "Please reconfirm your application, and press the “Submit” button.<br>We will send the application confirmed e-mail within three days. <br>If you do not receive the reply within three days, don’t hesitate to reach out to the organizer.<br><br>I confirmed that the application has been corrected and completed. It will not be modifiable after submit.",
    complete_text: "Thank you for preparing.<br>The result will be announced at 07/10（Tue).It will be reveal on the \" Za Share \" official website.",

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